<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 254);
			$table->integer('document_id')->unsigned();
			$table->integer('order');
			$table->integer('menu_id')->unsigned();
			$table->integer('parent_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('menu_items');
	}
}