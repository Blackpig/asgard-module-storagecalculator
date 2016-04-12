<?php namespace Modules\StorageCalculator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\StorageCalculator\Repositories\PackagingRepository;

class PackagingTableSeeder extends Seeder {

	private $packagingRepository;

	public function __construct(PackagingRepository $packagingRepository)
	{
		$this->packagingRepository = $packagingRepository;
	}


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		Model::reguard();
	}

}
