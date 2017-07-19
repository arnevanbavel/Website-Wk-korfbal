<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description');
			$table->text('url_image');
			$table->text('url_youtube');
			$table->integer('sender_team');
			$table->integer('sender_role');
			$table->string('url_youtube_full');
			$table->integer('album_id')->unsigned();
			$table->timestamps();
		});

		Schema::create('media_tag',function(Blueprint $table){

			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

			$table->integer('media_id')->unsigned()->index();
			$table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media_tag');
		Schema::drop('media');
	}

}
