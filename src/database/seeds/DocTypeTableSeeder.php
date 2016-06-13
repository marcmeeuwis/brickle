<?php namespace Doitonlinemedia\Admin;

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\DocumentType;

class DocTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('document_types')->delete();

		// Default Document Type
		DocumentType::create(array(
				'name' => 'home',
				'alias' => 'home',
				'icon' => ''
			));
	}
}