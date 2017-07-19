<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [
		'name'
	];

	public function news(){
		return $this->belongsToMany('App\News');
	}

	public function media(){
		return $this->belongsToMany('App\Media');
	}

	public function teamtag(){
		return $this->hasOne('App\Team','id','team');
	}
}
