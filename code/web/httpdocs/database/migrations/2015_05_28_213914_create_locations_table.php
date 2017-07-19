<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->double('long');
			$table->double('lat');
			$table->string('number');
			$table->string('street');
			$table->string('city');
			$table->string('url_image');
			$table->boolean('public');
			$table->integer('sender_team');
			$table->timestamps();
		});
		
		Schema::table('events',function($table)
		{
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('locations');
	}

}
