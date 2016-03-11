<?php

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('documents')->delete();

		// Default Document
		Document::create(array(
				'name' => 'Home',
				'slug' => '/',
				'published_date' => date('Y-m-d H:i:s'),
				'document_type_id' => 1,
				'user_id' => 1,
				'template_id' => 1
			));
	}
}