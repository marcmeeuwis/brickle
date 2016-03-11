<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTypesTable extends Migration {

	public function up()
	{
		Schema::create('document_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 254);
			$table->string('alias', 254);
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('icon', 254);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('document_types');
	}
}