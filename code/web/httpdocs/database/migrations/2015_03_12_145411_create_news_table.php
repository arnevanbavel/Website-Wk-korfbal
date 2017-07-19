<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('body_nl');
			$table->text('body_eng');
			$table->boolean('visible');
			$table->boolean('highlight');
			$table->integer('sender_role');
			$table->integer('sender_team');
			$table->string('url_image');
			$table->string('url_youtube');
			$table->string('url_youtube_full');
			$table->timestamp('publish_at');
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
		/* Dit gebeurt al in andere create -> Volgorde van migration */
		 //Schema::drop('news');
	}

}
