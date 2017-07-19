<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at'
	];
	
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	public function team(){
		return $this->belongsTo('App\Team','sender_team');
	}
}
