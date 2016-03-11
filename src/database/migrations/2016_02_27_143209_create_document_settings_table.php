<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentSettingsTable extends Migration {

	public function up()
	{
		Schema::create('document_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('deletable');
			$table->tinyInteger('trashed');
			$table->mediumInteger('level');
			$table->timestamps();
			$table->integer('document_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('document_settings');
	}
}