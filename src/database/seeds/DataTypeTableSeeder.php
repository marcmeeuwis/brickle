<?php namespace Doitonlinemedia\Admin;

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\DataType;

class DataTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('data_types')->delete();

		// Default Text Data Type
		DataType::create(array(
				'type' => 'text',
				'value_type' => 'varchar'
			));
	}
}