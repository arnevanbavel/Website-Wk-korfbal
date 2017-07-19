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
use App\Location;
use Carbon\Carbon;
use Validator;

use Illuminate\Http\Request;

class LocationsController extends Controller {

	public function index(){
		$locations  				= Location::all();
		return view('back.locations',compact('locations'));
	}

	public function getCreateLocation(){
		$userrole = \Auth::user()->role;
		return view('back.createLocation',compact('userrole'));
	}

	public function postCreateLocation(Request $request){
		$this->validate($request, ['name'=>'required','long'=>'required','lat'=>'required']);

		$location = new Location;

		$location->name				= $request->input('name');
		$location->long				= $request->input('long');
		$location->lat				= $request->input('lat');
		$location->street			= $request->input('street');
		$location->number			= $request->input('number');
		$location->city				= $request->input('city');
		$location->sender_team 		= \Auth::user()->team;

		if ($request->file('url_image')) {
			$imageName = date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/locations/', $imageName);
    		$location->url_image 			= '/images/locations/' . $imageName;
		}else{
			$location->url_image 			= '/img/sample.jpg';
		}

		$location->save();
		return redirect(action('EventsController@index'));
	}

	public function getEditLocation(Location $location){
				$userrole = \Auth::user()->role;

		return view('back.editLocation',compact('location','userrole'));
	}

	public function postEditLocation(Location $location,Request $request){
		$this->validate($request, ['name'=>'required','long'=>'required','lat'=>'required']);
		$location->name				= $request->input('name');
		$location->long				= $request->input('long');
		$location->lat				= $request->input('lat');
		$location->street			= $request->input('street');
		$location->number			= $request->input('number');
		$location->city				= $request->input('city');

		if ($request->file('url_image')) {
			$imageName = date('d-m-Y-h-i-s', time()) . '.' . $request->file('url_image')->getClientOriginalExtension();
    		$request->file('url_image')->move(base_path() . '/images/locations/', $imageName);
    		$location->url_image 			= '/images/locations/' . $imageName;
		}else{
			$location->url_image 			= '/img/sample.jpg';
		}

		$location->save();
		return redirect(action('EventsController@index'));
	}

	public function getDeleteLocation(Location $location){
		$location->delete();
		return redirect(action('EventsController@index'));
	}

}
