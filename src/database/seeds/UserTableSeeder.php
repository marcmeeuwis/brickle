<?php

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
				'username' => 'admin',
				'password' => bcrypt('6StepSuccess'),
				'email' => 'tim@doitonlinemedia.nl'
			));
	}
}