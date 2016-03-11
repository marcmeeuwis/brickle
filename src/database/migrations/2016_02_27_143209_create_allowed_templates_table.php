<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllowedTemplatesTable extends Migration {

	public function up()
	{
		Schema::create('allowed_templates', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('template_id')->unsigned();
			$table->integer('document_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('allowed_templates');
	}
}