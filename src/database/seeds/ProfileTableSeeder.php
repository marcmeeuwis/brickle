<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

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