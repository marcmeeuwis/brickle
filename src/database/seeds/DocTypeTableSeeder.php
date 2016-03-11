<?php

use Illuminate\Database\Seeder;
use App\Models\DocType;

class DocTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('document_types')->delete();

		// Default Document Type
		DocType::create(array(
				'name' => 'home',
				'alias' => 'home',
				'icon' => ''
			));
	}
}