<?php

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('templates')->delete();

		// Default Template
		Template::create(array(
				'path' => '/'
			));
	}
}