<?php

use App\Message;
use App\Events;
use App\Team;
use App\Player;
use App\Tag;
use App\News;
use App\Album;
use App\Media;
use App\Highscore;
use App\User;
use App\Location;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
  * @desc binds route query data with controller function
  * @param $value - id of item.
  * @param $route - route of controller function.
  * @return Object
*/

Route::bind('messageid', function($value,$route){
	return Message::where('id',$value)->first();
});

Route::bind('eventid', function($value,$route){
	return Events::where('id',$value)->first();
});

Route::bind('teamid', function($value,$route){
	return Team::where('id',$value)->first();
});

Route::bind('playerid', function($value,$route){
	return Player::where('id',$value)->first();
});

Route::bind('tagid', function($value,$route){
	return Tag::where('id',$value)->first();
});

Route::bind('newsid', function($value,$route){
	return News::where('id',$value)->first();
});

Route::bind('albumid', function($value,$route){
	return Album::where('id',$value)->first();
});

Route::bind('mediaid', function($value,$route){
	return Media::where('id',$value)->first();
});

Route::bind('highscoreid', function($value,$route){
	return Highscore::where('id',$value)->first();
});

Route::bind('userid', function($value,$route){
	return User::where('id',$value)->first();
});

Route::bind('locationid', function($value,$route){
	return Location::where('id',$value)->first();
});

// Frontend routes
Route::get('/', ['middleware' => 'app','uses'=>'FrontController@index']);
Route::get('about', ['middleware' => 'app','uses'=>'FrontController@about']);
Route::post('search','FrontController@postSearch');
Route::get('game',  ['middleware' => 'app','uses'=>'GameController@getGame']);


Route::get('news',['middleware' => 'app','uses'=>'FrontController@getNews']);
Route::get('/news/{newsid}', ['middleware' => 'app','uses'=>'FrontController@getNewsItem']);
Route::get('news/tag/{tagid}', ['middleware' => 'app','uses'=>'FrontController@getTagNews']);

Route::get('events',['middleware' => 'app','uses'=>'FrontController@getEvents']);
Route::get('events/team/{teamid}',['middleware' => 'app','uses'=>'FrontController@getTeamEvents']);
Route::get('locations',['middleware' => 'app','uses'=>'FrontController@getLocations']);

Route::get('team', ['middleware' => 'app','uses'=>'FrontController@getTeams']);
Route::get('/team/{teamid}', ['middleware' => 'app','uses'=>'FrontController@getTeam']);
Route::get('/team/favorite/{teamid}', ['middleware' => 'app','uses'=>'FrontController@postFavoriteTeam']);

Route::get('media',['middleware' => 'app','uses'=>'FrontController@getMedia']);
Route::get('media/tag/{tagid}',['middleware' => 'app','uses'=>'rontController@getTagMedia']);
Route::get('album/{albumid}',['middleware' => 'app','uses'=>'FrontController@getAlbum']);

Route::get('tickets',['middleware' => 'app','uses'=>'FrontController@getTickets']);

// Messages routes
Route::get('dashboard',['middleware' => 'auth', 'uses' => 'DashboardController@index']);
Route::get('dashboard/create/message', ['middleware' => 'auth', 'uses' => 'DashboardController@getCreateMessage']);
Route::post('dashboard/create/message', ['middleware' => 'auth', 'uses' => 'DashboardController@postCreateMessage']);
Route::get('dashboard/edit/message/{messageid}', ['middleware' => 'auth', 'uses' => 'DashboardController@getEditMessage']);
Route::post('dashboard/edit/message/{messageid}', ['middleware' => 'auth', 'uses' => 'DashboardController@postEditMessage']);
Route::get('dashboard/delete/message/{messageid}',['middleware' => 'auth', 'uses' => 'DashboardController@getDeleteMessage']);
Route::get('dashboard/message/{messageid}',['middleware' => 'auth', 'uses' => 'DashboardController@getMessage']);
Route::get('dashboard/teammessages/{teamid}',['middleware' => 'auth', 'uses' => 'DashboardController@getTeamMessages']);

// News routes
Route::get('dashboard/news', ['middleware' => 'auth', 'uses' => 'NewsController@index']);
Route::get('dashboard/create/news', ['middleware' => 'auth', 'uses' => 'NewsController@getCreateNews']);
Route::post('dashboard/create/news', ['middleware' => 'auth', 'uses' => 'NewsController@postCreateNews']);
Route::get('dashboard/edit/news/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@getEditNews']);
Route::post('dashboard/edit/news/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@postEditNews']);
Route::get('dashboard/delete/news/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@getDeleteNews']);
Route::get('dashboard/news/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@getNews']);
Route::get('dashboard/news/tag/{tagid}', ['middleware' => 'auth', 'uses' => 'NewsController@getTagNews']);
Route::get('dashboard/visible/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@hideShowNews']);
Route::get('dashboard/highlight/{newsid}', ['middleware' => 'auth', 'uses' => 'NewsController@highlightNews']);

// Tag routes
Route::get('dashboard/create/tag/', ['middleware' => 'auth', 'uses' => 'NewsController@createTag']);
Route::post('dashboard/create/tag/', ['middleware' => 'auth', 'uses' => 'NewsController@postTag']);
Route::get('dashboard/delete/tag/{tagid}', ['middleware' => 'auth', 'uses' => 'NewsController@deleteTag']);

// Team routes
Route::get('dashboard/team/', ['middleware' => 'auth', 'uses' => 'TeamsController@index']);
Route::get('dashboard/create/team', ['middleware' => 'auth', 'uses' => 'TeamsController@getCreateTeam']);
Route::post('dashboard/create/team', ['middleware' => 'auth', 'uses' => 'TeamsController@postCreateTeam']);
Route::get('dashboard/edit/team/{teamid}', ['middleware' => 'auth', 'uses' => 'TeamsController@getEditTeam']);
Route::post('dashboard/edit/team/{teamid}', ['middleware' => 'auth', 'uses' => 'TeamsController@postEditTeam']);
Route::get('dashboard/delete/team/{teamid}',['middleware' => 'auth', 'uses' => 'TeamsController@getTeamDelete']);
Route::get('dashboard/team/{teamid}',['middleware' => 'auth', 'uses' => 'TeamsController@getTeam']);

// Player routes
Route::get('dashboard/create/player/{teamid}', ['middleware' => 'auth', 'uses' => 'TeamsController@getCreatePlayer']);
Route::post('dashboard/create/player/{teamid}', ['middleware' => 'auth', 'uses' => 'TeamsController@postPlayer']);
Route::get('dashboard/edit/player/{playerid}', ['middleware' => 'auth', 'uses' => 'TeamsController@getEditPlayer']);
Route::post('dashboard/edit/player/{playerid}', ['middleware' => 'auth', 'uses' => 'TeamsController@postEditPlayer']);
Route::get('dashboard/delete/player/{playerid}',['middleware' => 'auth', 'uses' => 'TeamsController@getPlayerDelete']);

// User routes
Route::get('dashboard/edit/user/{userid}', ['middleware' => 'auth', 'uses' => 'TeamsController@getEditUser']);
Route::post('dashboard/edit/user/{userid}', ['middleware' => 'auth', 'uses' => 'TeamsController@postEdituser']);

// Media routes
Route::get('dashboard/media', ['middleware' => 'auth', 'uses' => 'MediaController@index']);
Route::get('dashboard/media/{mediaid}', ['middleware' => 'auth', 'uses' => 'MediaController@getMediaItem']);
Route::get('dashboard/create/media', ['middleware' => 'auth', 'uses' => 'MediaController@createMedia']);
Route::post('dashboard/create/media', ['middleware' => 'auth', 'uses' => 'MediaController@postMedia']);
Route::get('dashboard/edit/media/{mediaid}', ['middleware' => 'auth', 'uses' => 'MediaController@getEditMedia']);
Route::post('dashboard/edit/media/{mediaid}', ['middleware' => 'auth', 'uses' => 'MediaController@postEditMedia']);
Route::get('dashboard/delete/media/{mediaid}', ['middleware' => 'auth', 'uses' => 'MediaController@deleteMedia']);
Route::get('dashboard/media/tag/{tagid}', ['middleware' => 'auth', 'uses' => 'MediaController@getTagMedia']);

// Albums routes
Route::get('dashboard/album/{albumid}', ['middleware' => 'auth', 'uses' => 'MediaController@getAlbum']);
Route::get('dashboard/create/album', ['middleware' => 'auth', 'uses' => 'MediaController@getCreateAlbum']);
Route::post('dashboard/create/album', ['middleware' => 'auth', 'uses' => 'MediaController@postCreateAlbum']);
Route::get('dashboard/edit/album/{albumid}', ['middleware' => 'auth', 'uses' => 'MediaController@getEditAlbum']);
Route::post('dashboard/edit/album/{albumid}', ['middleware' => 'auth', 'uses' => 'MediaController@postEditAlbum']);
Route::get('dashboard/delete/album/{albumid}', ['middleware' => 'auth', 'uses' => 'MediaController@getAlbumDelete']);

// Events routes
Route::get('dashboard/events/', ['middleware' => 'auth', 'uses' => 'EventsController@index']);
Route::get('dashboard/events/{eventid}', ['middleware' => 'auth', 'uses' => 'EventsController@getEvent']);
Route::get('dashboard/create/event', ['middleware' => 'auth', 'uses' => 'EventsController@getCreateEvent']);
Route::post('dashboard/create/event', ['middleware' => 'auth', 'uses' => 'EventsController@postEvent']);
Route::get('dashboard/edit/event/{eventid}', ['middleware' => 'auth', 'uses' => 'EventsController@getEditEvent']);
Route::post('dashboard/edit/event/{eventid}', ['middleware' => 'auth', 'uses' => 'EventsController@postEditEvent']);
Route::get('dashboard/delete/event/{eventid}',['middleware' => 'auth', 'uses' => 'EventsController@getEventDelete']);
Route::get('dashboard/events/team/{teamid}',['middleware' => 'auth', 'uses' => 'EventsController@getTeamEvents']);

// Locations routes
Route::get('dashboard/locations/', ['middleware' => 'auth', 'uses' => 'LocationsController@index']);
Route::get('dashboard/create/location', ['middleware' => 'auth', 'uses' => 'LocationsController@getCreateLocation']);
Route::post('dashboard/create/location', ['middleware' => 'auth', 'uses' => 'LocationsController@postCreateLocation']);
Route::get('dashboard/edit/location/{locationid}', ['middleware' => 'auth', 'uses' => 'LocationsController@getEditLocation']);
Route::post('dashboard/edit/location/{locationid}', ['middleware' => 'auth', 'uses' => 'LocationsController@postEditLocation']);
Route::get('dashboard/delete/location/{locationid}',['middleware' => 'auth', 'uses' => 'LocationsController@getDeleteLocation']);

// Highscore routes
Route::get('highscore/', 'GameController@index');
Route::get('highscore/{user}/{score}/{hash}','GameController@getHighscore');
Route::get('highscore/delete/{highscoreid}', 'GameController@delete');
// Extra routes
Route::post('dashboard/search', ['middleware' => 'auth', 'uses' => 'DashboardController@postSearchResults']);
Route::get('dashboard/logout', ['middleware' => 'auth', 'uses' => 'DashboardController@getLogout']);


Route::post('language', ['as' => 'chooser', 'uses' => 'LanguageController@chooser']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);