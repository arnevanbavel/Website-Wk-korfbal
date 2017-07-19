<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->integer('thumb');
			$table->integer('sender_role');
			$table->integer('sender_team');
			$table->timestamps();
		});

		Schema::table('media', function($table)
		{
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('albums');
	}

}
