<?php namespace Modules\Storagecalculator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\StorageCalculator\Database\Seeders\VolumesTableSeeder;

class StorageCalculatorDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(VolumesTableSeeder::class);
		$this->call(PackagingTableSeeder::class);
		$this->call(StorageTableSeeder::class);

		Model::reguard();
	}

}
