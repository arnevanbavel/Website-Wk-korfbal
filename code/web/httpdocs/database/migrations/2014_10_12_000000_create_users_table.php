<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('role');
			$table->integer('team')->unsigned();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/*
	IMPORTANT !!!!!

	User level role
	###############

	1 - Admin Level
	2 - Guide Level
	3 - Player Level
	*/

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/* Dit gebeurt al in andere create -> Volgorde van migration */
		//Schema::drop('users');
	}

}
