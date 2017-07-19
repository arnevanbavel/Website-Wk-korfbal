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
use App\Location;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Validator;
	
class DashboardController extends Controller {

	public function index(){
		$userrole						= \Auth::user()->role;
		$userteam 						= \Auth::user()->teams;
		$teams							= Team::get();
		$teamid							= false; // Gets used in filter !
		$firstmessage 					= false;

		if($userrole === "1"){
			$messages 						= Message::where('delete_at', '>',Carbon::now('Europe/Brussels'))->orderBy('published_at', 'DESC')->get();
			$events 						= Events::where('date_start', '>=',Carbon::now('Europe/Brussels'))->take(5)->orderBy('date_start', 'ASC')->get();
		}
		elseif($userrole === "2"){
			$messages 						= $userteam->messages()->where('delete_at', '>',Carbon::now())->where('published_at','<',Carbon::now('Europe/Brussels'))->orderBy('published_at', 'DESC')->get();
			$events 						= $userteam->events()->where('date_start', '=>',Carbon::now())->take(5)->orderBy('date_start', 'ASC')->get();
		}else{
			$messages 						= $userteam->messages()->where('visible','!=',true)->where('delete_at', '>',Carbon::now())->where('published_at','<',Carbon::now('Europe/Brussels'))->orderBy('published_at', 'DESC')->get();
			$events 						= $userteam->events()->where('date_start', '=>',Carbon::now())->take(5)->orderBy('date_start', 'ASC')->get();
		}

		if (count($messages)>"0")  {
			$firstmessage 						= $messages->first()->id;
		}


		return view("back.dashboard",compact('messages','events','userrole','teams','teamid','firstmessage'));
	}

	/* DASHBOARD MESSAGES FUNCTIONS */

	public function getCreateMessage(){
		$userrole 					= \Auth::user()->role;
		$teams 						= Team::lists('name','id');
		return view("back.createMessage",compact('userrole','teams'));
	}

	public function postCreateMessage(Request $request){
		$this->validate($request, ['subject'=>'required','body'=>'required']);
    	

		$message = new Message;

		$message->save();

		$message->subject			= $request->input('subject');
		$message->body				= $request->input('body');
		$message->important			= $request->input('important');

		$message->sender_role		= \Auth::user()->role;
		$message->sender_team		= \Auth::user()->team;
		
		$message->visible			= $request->input('visible');

		if ($request->input('published_at')) {
			$message->published_at			= $request->input('published_at');
		}else{
			$message->published_at 			= Carbon::now('Europe/Brussels');
		}
		if ($request->input('delete_at')) {
			$message->delete_at				= $request->input('delete_at');
		}else{
			$message->delete_at 			= Carbon::now('Europe/Brussels')->addYears(10);
		}

		if (\Auth::user()->role === "1") {
			if ($request->input('global')) {
				foreach (Team::get() as $team) {
					$message->teams()->attach($team->id);
				}
			}else{
				$message->teams()->attach($request->input('to'));
			}
		}else{
			$message->teams()->attach(\Auth::user()->team);
		}

		if ($request->file('url_image')) {
			$imageName = $message->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/messages/', $imageName);
    		$message->url_image 			= '/images/messages/' . $imageName;
		}

		$message->save();

		return redirect(action('DashboardController@index'));
	}

	public function getEditMessage(Message $message){
		$userrole 					= \Auth::user()->role;
		$teams 						= Team::lists('name','id');
		$selected					= $message->teams()->lists('id');
		return view('back.editMessage',compact('message','userrole','teams','selected'));
	}

	public function postEditMessage(Message $message,Request $request){
		$this->validate($request, ['subject'=>'required','body'=>'required']);

		$message->subject			= $request->input('subject');
		$message->body				= $request->input('body');
		$message->important			= $request->input('important');

		$message->sender_role		= \Auth::user()->role;
		$message->sender_team		= \Auth::user()->team;

		$message->visible			= $request->input('visible');
		
		if ($request->input('published_at')) {
			$message->published_at			= $request->input('published_at');
		}else{
			$message->published_at 			= Carbon::now('Europe/Brussels');
		}

		if ($request->input('delete_at')) {
			$message->delete_at				= $request->input('delete_at');
		}else{
			$message->delete_at 			= Carbon::now('Europe/Brussels')->addYears(10);
		}

		if (\Auth::user()->role === "1") {
			if ($request->input('global')) {
				foreach (Team::get() as $team) {
					$message->teams()->sync($team->id);
				}
			}else{
				$message->teams()->sync($request->input('to'));
			}
		}else{
			$message->teams()->sync(\Auth::user()->team);
		}

		if($request->input('url_image_delete')){
			$message->url_image 			= false;
		}

		if ($request->file('url_image')) {
			$imageName = $message->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/messages/', $imageName);
    		$message->url_image 			= '/images/messages/' . $imageName;
		}

		$message->save();

		return redirect(action('DashboardController@index'));
	}

	public function getMessage(Message $message){
		$teams						= Team::get();
		$userrole 					= \Auth::user()->role;
		return view('back.message',compact('message','userrole','teams'));
	}

	public function getDeleteMessage(Message $message){
		$message->delete();
		return redirect(action('DashboardController@index'));
	}

	public function getTeamMessages(Team $team){
		$userrole 						= \Auth::user()->role;

		if($userrole === "1"){
			$teamid							= $team->id;
			$messages 						= $team->messages()->latest()->get();
			$teams							= Team::get();
			$events 						= Events::where('date_start', '>=',Carbon::now('Europe/Brussels'))->take(5)->orderBy('date_start', 'ASC')->get();
			$firstmessage 					= false;
			if (count($messages)>0)  {
				$firstmessage 						= $messages->first()->id;
			}
			return view("back.dashboard",compact('messages','events','userrole','teams','teamid','firstmessage'));
		}
		else{
			return redirect(action('DashboardController@index'));
		}
	}

	/* OTHER FUNCTIONS */
	public function postSearchResults(Request $request){
		 $keywords 				= $request->input('keyword');

		 $tags 					= Tag::where('team','=',false)->where('name', 'LIKE', "%$keywords%")->get();
		 $teamtags 				= Tag::where('team','!=',false)->where('name', 'LIKE', "%$keywords%")->get();
		 $teams 				= Team::where('name', 'LIKE', "%$keywords%")->get();
		 $players 				= Player::where('first_name', 'LIKE', "%$keywords%")->orWhere('last_name', 'LIKE', "%$keywords%")->get();
		 $events				= Events::where('subject', 'LIKE', "%$keywords%")->get();
		 $albums				= Album::where('name', 'LIKE', "%$keywords%")->get();
		 $media					= Media::where('description', 'LIKE', "%$keywords%")->get();
		 $locations				= Location::where('name', 'LIKE', "%$keywords%")->get();

		return view("back.searchResults",compact('tags','teamtags','teams','players','events','albums','media','locations'));
	}

	public function getLogout(){
		\Auth::logout();
		return redirect(action('FrontController@index'));
	}
}
