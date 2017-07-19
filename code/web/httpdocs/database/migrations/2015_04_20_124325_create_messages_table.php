<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('subject');
			$table->text('body');
			$table->boolean('important');
			$table->boolean('visible');
			$table->integer('sender_role');
			$table->string('sender_team');
			$table->timestamp('published_at');
			$table->timestamp('delete_at');
			$table->string('url_image');
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
		Schema::drop('messages');
	}

}
