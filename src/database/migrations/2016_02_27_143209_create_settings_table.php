<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('key', 254);
			$table->string('value', 254);
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}