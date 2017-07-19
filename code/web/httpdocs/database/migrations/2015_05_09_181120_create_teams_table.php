<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('about');
			$table->string('url_website');
			$table->string('url_facebook');
			$table->string('url_twitter');
			$table->string('url_flag');
			$table->string('url_cover');
			$table->string('hashtag');
			$table->integer('tag_id');
			$table->timestamps();
		});

		Schema::create('message_team',function(Blueprint $table){

			$table->integer('message_id')->unsigned()->index();
			$table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');

			$table->integer('team_id')->unsigned()->index();
			$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

			$table->timestamps();
		});

		Schema::create('events_team',function(Blueprint $table){

			$table->integer('events_id')->unsigned()->index();
			$table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');

			$table->integer('team_id')->unsigned()->index();
			$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

			$table->timestamps();
		});

		Schema::table('users', function($table)
		{
			$table->foreign('team')->references('id')->on('teams')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users'); // IMPORTANT -> volgorde van migrations
		Schema::drop('news'); // IMPORTANT -> volgorde van migrations
		Schema::drop('albums');
		Schema::drop('events_team');
		Schema::drop('message_team');
		Schema::drop('teams');
	}

}
