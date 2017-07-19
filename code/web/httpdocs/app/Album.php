<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	protected $fillable = [
		'name'
	];
	
	public function media(){
		return $this->hasMany('App\Media');
	}

	public function media_thumb(){
		return $this->hasOne('App\Media','id','thumb');
	}

	public function team(){
		return $this->belongsTo('App\Team');
	}
}
