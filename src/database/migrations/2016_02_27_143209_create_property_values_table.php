<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertyValuesTable extends Migration {

	public function up()
	{
		Schema::create('property_values', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('data_int');
			$table->datetime('data_date');
			$table->string('data_varchar', 1000);
			$table->text('data_text');
			$table->integer('document_id')->unsigned();
			$table->integer('property_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('property_values');
	}
}