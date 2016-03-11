<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('TemplateTableSeeder');
		$this->command->info('Template table seeded!');

		$this->call('DocTypeTableSeeder');
		$this->command->info('DocType table seeded!');

		$this->call('ProfileTableSeeder');
		$this->command->info('Profile table seeded!');

		$this->call('TabTableSeeder');
		$this->command->info('Tab table seeded!');

		$this->call('DataTypeTableSeeder');
		$this->command->info('DataType table seeded!');

		$this->call('DocumentTableSeeder');
		$this->command->info('Document table seeded!');



		$this->call('DocumentSettingsTableSeeder');
		$this->command->info('DocumentSettings table seeded!');
	}
}