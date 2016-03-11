<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTabsTable extends Migration {

	public function up()
	{
		Schema::create('tabs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('document_type_id')->unsigned();
			$table->string('name', 254);
		});
	}

	public function down()
	{
		Schema::drop('tabs');
	}
}