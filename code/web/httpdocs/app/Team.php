<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {


	protected $fillable = [
		'id',
		'name',
		'about',
		'url_website',
		'url_facebook',
		'url_twitter',
		'url_flag',
		'url_cover',
		'hashtag'
	];

	public function players(){
		return $this->hasMany('App\Player');
	}

	public function tag(){
		return $this->hasOne('App\Tag','team','id');
	}

	public function users(){
		return $this->hasMany('App\User','team');
	}

	public function news(){
		return $this->hasMany('App\News','sender_team');
	}

	public function albums(){
		return $this->hasMany('App\Album');
	}

	public function messages(){
		return $this->belongsToMany('App\Message');
	}

	public function events(){
		return $this->belongsToMany('App\Events');
	}
}
