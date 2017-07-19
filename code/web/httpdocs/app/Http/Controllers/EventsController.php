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
use App\Location;
use Illuminate\Http\Request;
use Validator;

class EventsController extends Controller {

	public function index(){
		$userrole 			= \Auth::user()->role;
		$userteam			= \Auth::user()->team;
		if (\Auth::user()->role === "1") {
			$events 			= Events::all();
			$locations 			= Location::all();
		}else{
			$events 			= \Auth::user()->teams->events()->get();
			$locations 			= Location::where('public','=',true)->orWhere('sender_team','=',\Auth::user()->team)->get();
		}
		$teams 				= Team::all();
		$title 				= "All events";
		return view("back.competition",compact('events','teams','locations','title','userrole','userteam'));
	}

	public function getEvent(Events $event){
		$userrole 			= \Auth::user()->role;
		$userteam			= \Auth::user()->team;	
		$teams 				= Team::all();
		$locations 			= Location::all();
		$title 				= $event->name;
		return view("back.eventItem",compact('event','teams','locations','title','userrole','userteam'));
	}

	public function getCreateEvent(){

		$locations 					= Location::lists('name','id');
		$userrole 					= \Auth::user()->role;
		$teams 						= Team::lists('name','id');
		return view("back.createEvent",compact('userrole','teams','locations'));
	}
 
	public function postEvent(Request $request){
		$this->validate($request, ['subject'=>'required','date_start'=>'required','date_end'=>'required','location_id'=>'required']);

		$events = new Events;

		$events->subject 			= $request->input('subject');
		$events->body 				= $request->input('body');
		$events->date_start 		= $request->input('date_start');
		$events->date_end 			= $request->input('date_end');
		$events->sender_role 		= \Auth::user()->role;
		$events->sender_team 		= \Auth::user()->team;
		if ($request->input('tournament')) {
			$events->tournament 		= $request->input('tournament');
		}

		if ($request->input('team_a')) {
			$events->team_a 		= $request->input('team_a');
			$events->team_b 		= $request->input('team_b');
		}

		$location =  Location::where('id',$request->input('location_id'))->first();
		$location->events()->save($events);

		if (\Auth::user()->role === "1") {
			$events->teams()->attach($request->input('to'));	
		}else{
			$events->teams()->attach(\Auth::user()->team);
		}

		return redirect(action('EventsController@index'));
	}

	public function getEditEvent(Events $events){
		$selectedteams				= $events->teams()->lists('id');
		$locations 					= Location::lists('name','id');
		$userrole 					= \Auth::user()->role;
		$teams 						= Team::lists('name','id');
		return view('back.editEvent',compact('events','userrole','teams','locations','teams','selectedteams'));
	}

	public function postEditEvent(Events $events,Request $request){
		$this->validate($request, ['subject'=>'required','date_start'=>'required','date_end'=>'required','location_id'=>'required']);

		$events->subject 			= $request->input('subject');
		$events->body 				= $request->input('body');
		$events->date_start 		= $request->input('date_start');
		$events->date_end 			= $request->input('date_end');
		$events->sender_role 		= \Auth::user()->role;
		$events->sender_team 		= \Auth::user()->team;

		if ($request->input('tournament')) {
			$events->tournament 		= $request->input('tournament');
		}
		if ($request->input('team_a')) {
			$events->team_a 		= $request->input('team_a');
			$events->team_b 		= $request->input('team_b');
		}

		$location =  Location::where('id',$request->input('location_id'))->first();
		$location->events()->save($events);

		if (\Auth::user()->role === "1") {
			$events->teams()->sync($request->input('to'));
 		}

		return redirect(action('EventsController@index'));
		
	}

	public function getEventDelete(Events $event){
		$event->delete();
		return redirect(action('EventsController@index'));
	}

	public function getTeamEvents(Team $team){
		$userrole 				= \Auth::user()->role;
		$userteam				= \Auth::user()->team;
		if (\Auth::user()->role === "1") {
			$events 				= $team->events()->get();
		}
		else{
			$events 				= $team->events()->where('tournament','=',true)->get();			
		}
		$teams 					= Team::all();
		$locations 				= Location::all();
		$title 					= 'Events by —' .$team->name;
		return view("back.competition",compact('events','teams','locations','title','userrole','userteam'));	
	}

	public function getLocationEvents(Location $location){
		$events 				= $location->events()->get();
		$teams 					= Team::all();
		$locations 				= Location::all();
		$title 					= 'Events hosted at —' .$location->name;
		return view("back.competition",compact('events','teams','locations','title'));	
	}
}
