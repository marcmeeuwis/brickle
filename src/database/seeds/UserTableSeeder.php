<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
				'username' => 'admin',
				'password' => bcrypt('admin'),
				'email' => 'tim@doitonlinemedia.nl'
			));
	}
}