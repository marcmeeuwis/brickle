<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataTypesTable extends Migration {

	public function up()
	{
		Schema::create('data_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 254);
			$table->string('value_type', 100);
			$table->string('directory', 254);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('data_types');
	}
}