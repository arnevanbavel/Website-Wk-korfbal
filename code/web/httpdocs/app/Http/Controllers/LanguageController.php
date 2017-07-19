<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Cookie;


class LanguageController extends Controller {

	public function chooser(Request $request){
		Cookie::queue(Cookie::make('locale',$request->input('locale'), 9000000));
		return redirect()->back();
	}
}
