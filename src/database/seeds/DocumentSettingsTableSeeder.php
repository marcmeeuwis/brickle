<?php

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\DocumentSettings;

class DocumentSettingsTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('document_settings')->delete();

		// Default Document Settings
		DocumentSettings::create(array(
				'document_id' => 1
			));
	}
}