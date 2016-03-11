<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration {

	public function up()
	{
		Schema::create('properties', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 254);
			$table->string('alias', 254);
			$table->tinyInteger('required');
			$table->integer('order');
			$table->integer('document_type_id')->unsigned();
			$table->integer('data_type_id')->unsigned();
			$table->integer('tab_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('properties');
	}
}