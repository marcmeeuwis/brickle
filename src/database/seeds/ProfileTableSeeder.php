<?php namespace Doitonlinemedia\Admin;

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\Profile;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('profiles')->delete();

		// Add User Detail
		Profile::create(array(
				'firstname' => 'Tim',
				'lastname' => 'van Uum',
				'address' => 'Lamerskamp 4',
				'place' => 'Gendringen',
				'user_id' => 1
			));
	}
}