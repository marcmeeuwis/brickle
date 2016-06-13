<?php namespace Doitonlinemedia\Admin;

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\Tab;

class TabTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('tabs')->delete();

		// Default Tab
		Tab::create(array(
				'document_type_id' => 1,
				'name' => 'Content'
			));
	}
}