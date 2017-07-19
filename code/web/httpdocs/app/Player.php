<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {


	protected $fillable = [
		'id',
		'first_name',
		'last_name',
		'number',
		'gender',
		'team'
	];

	public function team(){
		return $this->belongsTo('App\Team');
	}
}
