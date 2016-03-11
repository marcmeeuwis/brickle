<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	public function up()
	{
		Schema::create('documents', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 254);
			$table->string('slug', 254);
			$table->datetime('published_date');
			$table->integer('document_type_id')->unsigned();
			$table->integer('template_id')->unsigned();
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('parent_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('documents');
	}
}