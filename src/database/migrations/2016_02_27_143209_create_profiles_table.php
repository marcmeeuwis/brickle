<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('firstname', 254)->nullable();
			$table->string('lastname', 254)->nullable();
			$table->string('address', 254)->nullable();
			$table->string('place', 254)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('profiles');
	}
}