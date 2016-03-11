<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllowedTypesTable extends Migration {

	public function up()
	{
		Schema::create('allowed_types', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('type_id')->unsigned();
			$table->integer('allowed_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('allowed_types');
	}
}