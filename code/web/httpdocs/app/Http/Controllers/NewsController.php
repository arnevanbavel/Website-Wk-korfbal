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
use Carbon\Carbon;

use Illuminate\Http\Request;
 
class NewsController extends Controller {


/* GLOBAAL NIEWS */
	public function index(){
		$userrole 					= \Auth::user()->role;
		$userteam 					= \Auth::user()->team;

		$news 						= News::latest()->get();

		$teams 						= Tag::where('team','!=',false)->get();
		$tags						= Tag::where('team','=',false)->get();

		$team 						= \Auth::user()->team;

		$title						= "All News";

		return view("back.news",compact('userrole','news','userteam','tags','teams','title'));
	}

	public function getNews(News $news){
		$userrole 					= \Auth::user()->role;
		$userteam 					= \Auth::user()->team;
		$tags						= Tag::where('team','=',false)->get();
		$teams 						= Tag::where('team','!=',false)->get();
		return view("back.newsItem",compact('userrole','news','userteam','tags','teams'));
	}

	public function getCreateNews(){
		$tags						= Tag::where('team','=',false)->where('name','!=','frontpage')->lists('name','id');
		$teams						= false;

		if(\Auth::user()->role === "1"){
			$tags						= Tag::where('team','=',false)->lists('name','id');
			$teams 						= Tag::where('team','!=',false)->lists('name','id');
		}
		return view("back.createNews",compact('edit','tags','teams'));
	}

	public function postCreateNews(Request $request){
		$this->validate($request, ['title'=>'required','body_eng'=>'required']);

		$news = new News;

		$news->title				= $request->input('title');
		$news->body_eng				= $request->input('body_eng');
		$news->visible				= $request->input('visible');
		$news->sender_team			= \Auth::user()->team;
		$news->sender_role			= \Auth::user()->role;

		if ($request->input('body_nl')) {
			$news->body_nl				= $request->input('body_nl');
		}

		if ($request->input('publish_at')) {
			$news->publish_at			= $request->input('publish_at');
		}else{
			$news->publish_at 			= Carbon::now('Europe/Brussels');
		}

		if ($request->input('url_youtube')) {
			preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",$request->input('url_youtube'), $matches);
			$news->url_youtube			= $matches[1];
			$news->url_youtube_full		= $matches[0];
		}

		if($request->file('url_image')){
			$imageName = $news->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/news/', $imageName);
    		$news->url_image 			= '/images/news/' . $imageName;
		}
		
		$news->save();

		if(!(\Auth::user()->role === "1")){
			$teamtag 					= Tag::where('team','=',\Auth::user()->team)->first();
			$news->tags()->attach($teamtag->id);
		}else{
			$frontpage 					= Tag::where('name','=','frontpage')->first();
			$news->tags()->attach($frontpage );
		}

		$news->tags()->attach($request->input('tags'));


		return redirect(action('NewsController@index'));
	}

	public function getEditNews(News $news){

		$tags						= Tag::where('team','=',false)->where('name','!=','frontpage')->lists('name','id');
		$selectedtags				= $news->tags()->where('team','=',false)->lists('id');

		$teams						= false;
		$selectedteams				= false;

		if(\Auth::user()->role === "1"){
			$tags						= Tag::where('team','=',false)->lists('name','id');
			$teams 						= Tag::where('team','!=',false)->lists('name','id');
			$selectedteams				= $news->tags()->where('team','!=',false)->lists('id');
		}

		return view("back.editNews",compact('news','tags','selectedteams','selectedtags','teams'));
	}

	public function postEditNews(News $news,Request $request){
		$this->validate($request, ['title'=>'required','body_eng'=>'required']);

		$news->title				= $request->input('title');
		$news->body_eng				= $request->input('body_eng');
		$news->visible				= $request->input('visible');


		if ($request->input('body_nl')) {
			$news->body_nl				= $request->input('body_nl');
		}

		if ($request->input('publish_at')) {
			$news->publish_at		= $request->input('publish_at');
		}

		if ($request->input('url_youtube')) {
			preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $request->input('url_youtube'), $matches);
			$news->url_youtube			= $matches[1];
			$news->url_youtube_full		= $matches[0];
		}

		if($request->input('url_image_delete')){
			$news->url_image 			= false;
		}

		if($request->file('url_image')){
			$imageName = $news->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/news/', $imageName);
    		$news->url_image 			= '/images/news/' . $imageName;
		}

		$news->save();

		$news->tags()->sync($request->input('tags'));

		if(!(\Auth::user()->role === "1")){
			$teamtag 					= Tag::where('team','=',\Auth::user()->team)->first();
			$news->tags()->attach($teamtag->id);
		}else{
			if($news->sender_role === \Auth::user()->role){
				$frontpage 					= Tag::where('name','=','frontpage')->first();
				$news->tags()->attach($frontpage );
			}
		}

		return redirect(action('NewsController@getNews', $news->id));
	}

	public function getDeleteNews(News $news){
		$news->delete();
		return redirect(action('NewsController@index'));
	}

	public function hideShowNews(News $news){

		if ($news->visible) {
			$news->visible 			= false;
		}else{
			$news->visible 			= true;
		}

		$news->save();
		return redirect(action('NewsController@index'));
	}

	public function highlightNews(News $news){
		
		if ($news->highlight) {
			$news->highlight 			= false;
		}else{
			$news->highlight 			= true;
		}

		$news->save();
		return redirect(action('NewsController@index'));
	}

	/* TAG NEWS */

	public function getTagNews(Tag $tag){
		$userrole 					= \Auth::user()->role;
		$userteam 					= \Auth::user()->team;
		$teams 						= Tag::where('team','!=',false)->get();
		$tags						= Tag::where('team','=',false)->get();
		$news 						= $tag->news()->latest()->get();
		$title 						= $tag->name;
		return view("back.news",compact('news','userrole','userteam','tags','teams','title'));
	}

	/* TAG NEWS */

	public function createTag(){
		return view("back.createTag");
	}

	public function postTag(Request $request){
		$this->validate($request, ['name'=>'required']);

		$tag 					= new Tag;
		$tag->name				= $request->input('name');
		$tag->save();
		return redirect(action('NewsController@index'));
	}

	public function deleteTag(Tag $tag){
		$tag->delete();
		return redirect(action('NewsController@index'));
	}
}

