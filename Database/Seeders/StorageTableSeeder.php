<?php namespace Modules\Storagecalculator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\StorageCalculator\Repositories\StorageRepository;

class StorageTableSeeder extends Seeder {

	private $volumeRepository;

	public function __construct(StorageRepository $storageRepository)
	{
		$this->storageRepository = $storageRepository;
	}


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$data = [
			['General Warehouse Room', '', 4.75, 'per cubic metre per month','Discount_period'],
			['Storage Container', '7 cubic metres', 4.75, 'per month','Discount_quantity'],
			['Palletised Storage', '', 30, 'per month',''],
		];

		foreach($data as $item) {
	    	$insert['en']['name'] = $item[0];
	    	$insert['fr']['name'] = $item[0];
	    	$insert['en']['blurb'] = $item[1];
	    	$insert['fr']['blurb'] = $item[1];
	    	$insert['unit_price'] = $item[2];
	    	$insert['en']['unit'] = $item[3];
	    	$insert['fr']['unit'] = $item[3];
	    	$insert['discount_type'] = $item[4];

	    	$this->storageRepository->create($insert);
    	}

		Model::reguard();
	}

}
