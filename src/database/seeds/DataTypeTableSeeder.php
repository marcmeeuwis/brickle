<?php

use Illuminate\Database\Seeder;
use App\Models\DataType;

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