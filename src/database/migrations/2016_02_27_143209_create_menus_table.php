<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 254);
			$table->string('alias', 254);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('menus');
	}
}