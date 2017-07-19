<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	public function album(){
		return $this->belongsTo('App\Album');
	}
}
