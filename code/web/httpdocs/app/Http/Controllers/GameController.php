<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Game;
use App\Highscore;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Album;

class GameController extends Controller {

	public function index(){
		$highscores 					= Highscore::lists('score','name');
		return view("back.highscore",compact('highscores'));
	}

	public function getHighscore($user,$score,$hash){

		$secretKey = "Kball";
  	    $realHash = md5($user . $score . $secretKey);

  	    if ($realHash === $hash) {
  	       	$highscore 						= new Highscore;
		 	$highscore->name				= $request->input('name');
		 	$highscore->score				= $request->input('score');
		 	$highscore->save();
  	    }
	}

	public function delete(Highscore $highscore){
		$highscore->delete();
	}

	public function getGame(){
		$albums = Album::all();
		return view("front.game",compact('albums'));
	}
}
