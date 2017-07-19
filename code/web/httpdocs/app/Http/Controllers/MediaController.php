<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\Message;
use App\Events;
use App\Team;
use App\User;
use App\Player;
use App\Tag;
use App\Album;
use App\Media;

use Carbon\Carbon;


use Illuminate\Http\Request;
 use Validator;

class MediaController extends Controller {


	public function index(){
		$userrole 					= \Auth::user()->role;
		$userteam					= \Auth::user()->team;
		$teams 						= Tag::where('team','!=',false)->get();
		$tags						= Tag::where('team','=',false)->get();
		$albums 					= Album::all();

		return view("back.media",compact('albums','tags','teams','userrole','userteam'));
	}
	
	// Media CRUD

	public function getMediaItem(Media $media){
		dd($media->find(1)->album->name);
	}
	
	public function createMedia(){
		if (\Auth::user()->role === "1") {
			$albums 					= Album::lists('name','id');
		}else{
			$albums 					= Album::where('sender_team','=',\Auth::user()->team)->lists('name','id');
		}
		$tags						= Tag::lists('name','id');
		return view("back.createMedia",compact('tags','albums'));
	}
	
	public function postMedia(Request $request){
		$this->validate($request, ['description'=>'required']);

		$media = new Media;

		$media->description			= $request->input('description');
		if (!(\Auth::user()->role === "1")) {
			$media->sender_team			= \Auth::user()->team;
		}


		if ($request->input('url_youtube')) {
			preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $request->input('url_youtube'), $matches);
			$media->url_youtube			= $matches[1];
			$media->url_youtube_full	= $matches[0];
		}

		if ($request->file('url_image')) {
			$imageName = date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/media/', $imageName);
    		$media->url_image 			= '/images/media/' . $imageName;
		}


		$album =  Album::where('id',$request->input('album_id'))->first();

		$album->media()->save($media);

		if(!(\Auth::user()->role === "1")){
			$teamtag 					= Tag::where('team','=',\Auth::user()->team)->first();
			$media->tags()->attach($teamtag->id);
		}

		$media->tags()->attach($request->input('tags'));
		
		return redirect(action('MediaController@getAlbum', $album->id));
	}
	
	public function getEditMedia(Media $media){

		$tags						= Tag::lists('name','id');
		$albums 					= Album::lists('name','id');
		return view("back.editMedia",compact('media','albums','tags'));
	}

	public function postEditMedia(Media $media,Request $request){
		$this->validate($request, ['description'=>'required']);

		$media->description			= $request->input('description');

		$album =  Album::where('id',$request->input('album_id'))->first();

		$album->media()->save($media);
		
		if(!(\Auth::user()->role === "1")){
			$teamtag 					= Tag::where('team','=',\Auth::user()->team)->first();
			$media->tags()->attach($teamtag->id);
		}
		
		$media->tags()->sync($request->input('tags'));

		return redirect(action('MediaController@getAlbum', $album->id));
	}

	public function deleteMedia(Media $media){
		$album = $media->album_id;
		$media->delete();
		return redirect(action('MediaController@getAlbum', $album));
	}

	public function getTagMedia(Tag $tag){
		$userrole 					= \Auth::user()->role;
		$userteam					= \Auth::user()->team;
		$album						= $tag;
		$teams 						= Tag::where('team','!=',false)->get();
		$tags						= Tag::where('team','=',false)->get();
		return view("back.album",compact('album','tags','teams','userteam','userrole'));

	}

	// Album CRUD 

	public function getAlbum(Album $album){
		$userrole 					= \Auth::user()->role;
		$userteam					= \Auth::user()->team;
		$teams 						= Tag::where('team','!=',false)->get();
		$tags						= Tag::where('team','=',false)->get();
		return view("back.album",compact('album','tags','teams','userteam','userrole'));
	}
	
	public function getCreateAlbum(){
		return view("back.createAlbum",compact(''));
	}
	
	public function postCreateAlbum(Request $request){
		$this->validate($request, ['name'=>'required']);

		$album = new Album;
		$album->name				= $request->input('name');
		$album->thumb 				= "1";
		if (!(\Auth::user()->role === "1")) {
			$album->sender_team			= \Auth::user()->team;
		}
		$album->save();

		return redirect(action('MediaController@getAlbum', $album->id));
	}

	public function getEditAlbum(Album $album){
		$albummedia					= $album->media()->where('url_youtube','!=',false)->lists('description','id');
		return view("back.editAlbum",compact('album','albummedia'));
	}

	public function postEditAlbum(Album $album,Request $request){
		$this->validate($request, ['name'=>'required']);

		$album->name				= $request->input('name');
		if($request->input('thumb')){
			$album->thumb				= $request->input('thumb');
		}
		$album->save();

		return redirect(action('MediaController@getAlbum', $album->id));
	}

	public function getAlbumDelete(Album $album){
		$album->delete();
		return redirect(action('MediaController@index'));
	}
}