<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\Team;
use App\Tag;
use App\Events;
use App\Media;
use App\Album;
use App\Location;
use App\Player;

use Illuminate\Http\Request;
use Cookie;

class FrontController extends Controller {


	public function index(){
		$favteam 			= Cookie::get('favteam');
		$teams 				= Team::all();
		$fronttag 			= Tag::where('id','=',"17")->first();
		$news 				= $fronttag->news()->get(); // 10 items + globaal + not hidden+ published 

		if ($favteam > 0) {
			$favteamteam 		= Team::where('id','=',$favteam)->first();
			$favteamtag			= $favteamteam->tag->first();
			$part1				= $fronttag->news()->get();
			$array 				= $part1->merge($favteamtag->news()->latest()->get());
			$news 				= $array; 
		}

		$events				= Events::where('tournament', '=', true)->get(); // few items
		$albums 			= Album::all();
		return view("front.home",compact('news','teams','events','albums'));
	}

	public function getGame(){
		$albums 			= Album::all();
		return view("front.about",compact('albums'));
	}

	public function about(){
		$albums 			= Album::all();
		return view("front.about",compact('albums'));
	}	


	public function postSearch(Request $request){
		 $keywords 				= $request->input('keyword');
		 //news search!!
		 $tags 					= Tag::where('team','=',false)->where('name', 'LIKE', "%$keywords%")->get();
		 $teamtags 				= Tag::where('team','!=',false)->where('name', 'LIKE', "%$keywords%")->get();
		 $teams 				= Team::where('name', 'LIKE', "%$keywords%")->get();
		 $players 				= Player::where('first_name', 'LIKE', "%$keywords%")->orWhere('last_name', 'LIKE', "%$keywords%")->get();
		 $events				= Events::where('subject', 'LIKE', "%$keywords%")->get(); //tournament only
		 $albums				= Album::where('name', 'LIKE', "%$keywords%")->get();
		 $media					= Tag::where('name', 'LIKE', "%$keywords%")->get();
		 $locations				= Location::where('name', 'LIKE', "%$keywords%")->get(); // public only

		return view("front.searchTags",compact('tags','teamtags','teams','players','events','albums','media','locations'));
	}

	/* NEWS CONTROLLER FUNCTIONS */

	public function getNews(){
		$news 				= News::latest()->get(); // globaal + not hidden+ published 
		$albums 			= Album::all();
		return view("front.news",compact('news','albums'));
	}

	public function getNewsItem(News $news){
		/*other news*/
		$albums 			= Album::all();
		return view('front.newsItem',compact('news','albums')); // not hidden + published 
	}

	public function getTagNews(Tag $tag){
		$news 				= $tag->news()->latest()->get(); // 10 items + globaal + not hidden+ published 
		$teamflag 			= false;
		$albums 			= Album::all();
		if ($tag->team_id) {
			$teamflag 			= $tag->team->url_flag; //give flag to view
		}
		return view("front.news",compact('news','teamflag','albums'));
	}


	/* EVENTS CONTROLLER FUNCTIONS */

	public function getEvents(){
		$teams 				= Team::all();
		$selected			= 0;
		$albums 			= Album::all();
		$events				= Events::where('tournament', '=', true)->get(); // few items
		return view("front.events",compact('events','teams','selected','albums'));
	}

	public function getEvent(Event $event){
		$albums 			= Album::all();
 	}

	public function getTeamEvents(Team $team){
		$teams 				= Team::all();
		$selected			= $team->id;
		$albums 			= Album::all();
		$events				= Events::where('tournament', '=', true)->where('team_a', '=', $team->id)->orWhere('team_b', '=', $team->id)->get(); // few items
		return view("front.events",compact('events','selected','teams','albums'));
	}

	/* LOCATIONS CONTROLLER FUNCTIONS */

	public function getLocations(){
		$locations				= Location::all(); // public locations
		$albums 			= Album::all();
		return view("front.locations",compact('locations','albums'));
	}

	public function getLocation(Location $location){
		$albums 			= Album::all();
	}

	/* TEAM CONTROLLER FUNCTIONS */

	public function getTeam(Team $team){
		$albums 			= Album::all();
		return view('front.team',compact('team','albums')); 
	}

	public function getTeams(){
		$teams 				= Team::all();
		$albums 			= Album::all();
		return view('front.teams',compact('teams','albums')); 
	}

	public function postFavoriteTeam(Team $team){
		Cookie::queue(Cookie::make('favteam', $team->id, 9000000));
	}

	/* MEDIA CONTROLLER FUNCTIONS */

	public function getMedia(){
		$albums 					= Album::all();
		return view('front.media',compact('albums'));
	}

	public function getTagMedia(Tag $tag){
		$albums 			= Album::all();
		$media 					= $tag->media()->latest()->get();
		return view('front.tagmedia',compact('media','tag','albums'));
	}

	public function getAlbum(Album $album){
		$albums 			= Album::all();
		return view('front.album',compact('album','albums'));
	}

	public function getTickets(){
		$albums 			= Album::all();
		return view('front.tickets',compact('albums')); 
	}
}
