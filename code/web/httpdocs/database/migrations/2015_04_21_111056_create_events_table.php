<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('subject');
			$table->text('body');
			$table->integer('location_id')->unsigned();
			$table->boolean('tournament');
			$table->integer('sender_role');
			$table->integer('sender_team');
			$table->integer('team_a');
			$table->integer('team_b');
			$table->timestamp('date_start');
			$table->timestamp('date_end');
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
		Schema::drop('events');
		Schema::drop('locations');
	}

}
