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
use Hash;

class TeamsController extends Controller {

/* TEAMS */

	public function index(){
		$userrole 					= \Auth::user()->role;
		$userteam 					= \Auth::user()->team;

		if($userrole === "1"){
			if(Team::first()){
				return redirect(action('TeamsController@getTeam', Team::first()->id));
			}
			else{
				return redirect(action('TeamsController@getCreatTeam'));
			}
		}
		else{
			return redirect(action('TeamsController@getTeam', $userteam));
		}
	}

	public function getTeam(Team $team){
		$teams 						= Team::all();
		$userrole 					= \Auth::user()->role;
		$userteam 					= \Auth::user()->team;
		$users                      = false;
		$edit 						= false;

		if ($userrole === "1" || ($userteam === $team->id && $userrole === "2" )) {
			$users 						= $team->users;
		}

		if ($userrole === "1" || $userteam === $team->id) {
			$edit = true;
		}

		return view("back.team",compact('team','teams','userrole','userteam','users','edit'));
	}	

	public function getCreateTeam(){
		return view("back.createTeam");
	}

	public function postCreateTeam(Request $request){
		$this->validate($request, ['name'=>'required','url_flag'=>'required','email'=>'required','password_guide'=>'required','password_player'=>'required']);

		$team = new Team;

		$team->name					= $request->input('name');
		$team->about				= $request->input('about');
		
		$team->url_website			= $request->input('url_website');
		$team->url_facebook			= $request->input('url_facebook');
		$team->url_twitter			= $request->input('url_twitter');

		$team->hashtag				= $request->input('hashtag');

		if($request->file('url_cover')){
			$imageName = $team->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_cover')->getClientOriginalExtension();
    		$request->file('url_cover')->move(base_path() . '/images/team/', $imageName);
    		$team->url_cover 			= '/images/team/' . $imageName;
		}else{
			$team->url_cover 			= '/img/sample.jpg';
		}

		if($request->file('url_flag')){
			$imageName = $team->id . 'flag' . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_flag')->getClientOriginalExtension();
    		$request->file('url_flag')->move(base_path() . '/images/team/', $imageName);
    		$team->url_flag 			= '/images/team/' . $imageName;
		}
		
		$team->save();

		$tag = new Tag;
		$tag->name					= $team->name;
		$tag->team					= $team->id;

		$tag->save();

		$guide = new User;
		$guide->name 				= ($request->input('name'))."-guide";
		$guide->role 				= 2;
		$guide->email 				= ($request->input('email'));
		$guide->password 			= bcrypt($request->input('password_guide'));

		$player = new User;
		$player->name 				= $request->input('name');
		$player->role 				= 3;
		$player->email 				= str_replace(' ', '-', $request->input('name')) . "@test.be";
		$player->password 			= bcrypt($request->input('password_player'));

		$team->users()->saveMany([$guide,$player]);

		return redirect(action('TeamsController@getTeam', $team->id));
	}

	public function getEditTeam(Team $team){
		return view("back.editTeam",compact('team'));
	}

	public function postEditTeam(Team $team,Request $request){
		$this->validate($request, ['name'=>'required']);

		$team->name					= $request->input('name');
		$team->about				= $request->input('about');
		
		$team->url_website			= $request->input('url_website');
		$team->url_facebook			= $request->input('url_facebook');
		$team->url_twitter			= $request->input('url_twitter');

		$team->hashtag				= $request->input('hashtag');
		
		if($request->input('url_cover_delete')){
			$team->url_cover 			= '/img/sample.jpg';
		}	

		if($request->file('url_cover')){
			$imageName = $team->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_cover')->getClientOriginalExtension();
    		$request->file('url_cover')->move(base_path() . '/images/team/', $imageName);
    		$team->url_cover 			= '/images/team/' . $imageName;
		}else{
			if(!($team->url_cover)){
				$team->url_cover 			= '/img/sample.jpg';
			}
		}

		if($request->file('url_flag')){
			$imageName = $team->id . 'flag' . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_flag')->getClientOriginalExtension();
    		$request->file('url_flag')->move(base_path() . '/images/team/', $imageName);
    		$team->url_flag 			= '/images/team/' . $imageName;
		}
		
		$team->save();

		return redirect(action('TeamsController@getTeam', $team->id));
	}

	public function getTeamDelete(Team $team){
		Message::where('sender_team', '=', $team->id)->delete();
		Tag::where('team','=',$team->id)->delete();
		
		$team->delete();

		return redirect(action('TeamsController@index'));
	}


/* PLAYERS */

	public function getCreatePlayer(Team $team){
		return view("back.createPlayer",compact('teams','team'));
	}

	public function postPlayer(Team $team,Request $request){
		$this->validate($request, ['first_name'=>'required','last_name'=>'required','number'=>'required']);

		$player = new Player;

		$player->first_name			= $request->input('first_name');
		$player->last_name			= $request->input('last_name');
		$player->number				= $request->input('number');
		$player->gender				= $request->input('gender');

		if($request->file('url_image')){
			$imageName = $player->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/players/', $imageName);
    		$player->url_image 			= '/images/players/' . $imageName;
		}
		
		$team->players()->save($player);

		return redirect(action('TeamsController@getTeam', $team->id));
	}

	public function getEditPlayer(Player $player){
		$userrole					= \Auth::user()->role;
		$teams 						= Team::lists('name','id');
		return view("back.editPlayer",compact('player','teams','userrole'));
	}

	public function postEditPlayer(Player $player,Request $request){
		$this->validate($request, ['first_name'=>'required','last_name'=>'required','number'=>'required']);

		$player->first_name			= $request->input('first_name');
		$player->last_name			= $request->input('last_name');
		$player->number				= $request->input('number');
		$player->gender				= $request->input('gender');

		if($request->input('url_image_delete')){
			$player->url_image 			= '/img/sample.jpg';
		}	

		if($request->file('url_image')){
			$imageName = $player->id . date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/players/', $imageName);
    		$player->url_image 			= '/images/players/' . $imageName;
		}else{
			if(!($player->url_image)){
				$player->url_image 			= '/img/sample.jpg';
			}
		}
		if(\Auth::user()->role === "1"){
		$player->team_id			= $request->input('team');

		}

		$player->save();

		return redirect(action('TeamsController@getTeam', $player->team_id));
	}

	public function getPlayerDelete(Player $player){
		$team_id = $player->team_id;
		$player->delete();

		return redirect(action('TeamsController@getTeam', $team_id));
	}

	public function getEditUser(User $user){
		return view("back.editUser",compact('user'));
	}

	public function postEditUser(User $user,Request $request){

		$user->password			= Hash::make($request->input('password'));
		

		$user->save();

		return redirect(action('TeamsController@getTeam', $user->team));
	}

}