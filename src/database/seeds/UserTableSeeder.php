<?php

use Illuminate\Database\Seeder;
use Doitonlinemedia\Admin\App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
				'username' => 'admin',
				'password' => bcrypt('admin'),
				'email' => 'your@email.com'
			));
	}
}