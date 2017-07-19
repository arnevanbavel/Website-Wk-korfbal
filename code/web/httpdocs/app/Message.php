<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = [
		'subject',
		'body',
		'published_at',
		'important',
		'sender_role',
		'sender_team',
		'delete_at'
	];

	public function teams(){
		return $this->belongsToMany('App\Team');
	}
	
	public function sender(){
		return $this->hasOne('App\Team','id','sender_team');
	}
}
