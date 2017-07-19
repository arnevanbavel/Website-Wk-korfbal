<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model {

	protected $fillable = [
		'subject',
		'body',
		'date_start',
		'date_end',
		'location_text',
		'location_lat',
		'location_long',
		'tournament',
		'sender_role',
		'sender_team',
		'team_a',
		'team_b'
	];

	public function teams(){
		return $this->belongsToMany('App\Team');
	}

	public function location(){
		return $this->belongsTo('App\Location');
	}
	public function teama(){
		return $this->hasOne('App\Team','id','team_a');
	}
	public function teamb(){
		return $this->hasOne('App\Team','id','team_b');
	}
}
