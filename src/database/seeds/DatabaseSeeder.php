<?php namespace Doitonlinemedia\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminDatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('Doitonlinemedia\Admin\UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('Doitonlinemedia\Admin\TemplateTableSeeder');
		$this->command->info('Template table seeded!');

		$this->call('Doitonlinemedia\Admin\DocTypeTableSeeder');
		$this->command->info('DocType table seeded!');

		$this->call('Doitonlinemedia\Admin\ProfileTableSeeder');
		$this->command->info('Profile table seeded!');

		$this->call('Doitonlinemedia\Admin\TabTableSeeder');
		$this->command->info('Tab table seeded!');

		$this->call('Doitonlinemedia\Admin\DataTypeTableSeeder');
		$this->command->info('DataType table seeded!');

		$this->call('Doitonlinemedia\Admin\DocumentTableSeeder');
		$this->command->info('Document table seeded!');

		$this->call('Doitonlinemedia\Admin\DocumentSettingsTableSeeder');
		$this->command->info('DocumentSettings table seeded!');
	}
}