<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemplatesTable extends Migration {

	public function up()
	{
		Schema::create('templates', function(Blueprint $table) {
			$table->increments('id');
			$table->string('path', 254);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('templates');
	}
}