<?php namespace Modules\Storagecalculator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\StorageCalculator\Repositories\VolumesRepository;

class VolumesTableSeeder extends Seeder {

	private $volumeRepository;

	public function __construct(VolumesRepository $volumeRepository)
	{
		$this->volumeRepository = $volumeRepository;
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
			['general_furniture', 'Small wardrobe', 'Petite armoire', 82],
			['general_furniture', 'Medium wardrobe',  'Armoire moyenne',143],
			['general_furniture', 'Large wardrobe',  'Grande armoire',16],
			['general_furniture', 'Armchair',  'Fauteuil',4],
			['general_furniture', 'Sofa 2 seater',  'Canapé 2 places',129],
			['general_furniture', 'Sofa 3 seater',  'Canapé 3 places',17],
			['general_furniture', 'Corner sofa',  'Canapé d\'angle',252],
			['office', 'Sideboard',  'Buffet',135],
			['office', 'Bookcase',  'Bibliothèque',21],
			['office', 'Small Desk',  'Petit bureau',17],
			['office', 'Large desk',  'Grand bureau',85],
			['office', 'Cupboard',  'Placard',35],
			['beds', 'Single',  'Simple',72],
			['beds', 'Double',  'Double',122],
			['electrical', 'Hi-Fi',  'Hi-Fi',6],
			['electrical', 'Large Freezer',  'Grand congélateur',59],
			['electrical', 'Chest Freezer',  'Congélateur coffre',5],
			['electrical', 'Cooker', 'Cuisinier', 21],
			['electrical', 'Washing machine', 'Machine à laver', 26],
			['electrical', 'Dishwasher', 'Lave-vaisselle', 26],
			['electrical', 'Microwave', 'Micro onde', 1],
			['electrical', 'Computer', 'Ordinateur', 12],
			['electrical', 'American fridge', 'Réfrigérateur américain', 112],
			['electrical', 'Fridge', 'Réfrigérateur', 5],
			['electrical', 'Mini fridge', 'Mini-réfrigérateur', 29],
			['electrical', 'Tumble dryer', 'Sèche-linge', 25],
			['electrical', 'TV', 'TV', 21],
			['electrical', 'Lampshade', 'abat-jour', 3],
			['outside', 'Small mirror', 'Petit miroir', 1],
			['outside', 'Medium mirror', 'Miroir moyen', 4],
			['outside', 'Dresser', 'Commode', 11],
			['outside', 'Under sink cupboard', 'Placard sous l\'évier', 15],
			['gas', 'Cooker', 'Cuisinier', 29],
			['tables', 'Coffee table', 'Table basse', 29],
			['tables', 'Medium table', 'Table à moyen', 7],
			['tables', 'Pedestal table', 'Guéridon', 98],
			['tables', 'Dining table', 'Table à manger', 142],
			['chairs', 'Dining chair', 'Chaise de salle à manger', 17],
			['chairs', 'Office chair', 'Chaise de bureau', 19],
			['cupboards', 'Base unit', 'Unité de base', 35],
			['cupboards', 'Wall unit', 'Unité murale', 19],
			['cupboards', 'Dresser', 'Commode', 255],
			['cupboards', 'Tallboy', 'Commode de grand garcon', 33],
			['cupboards', 'TV cupboard', 'Unité TV', 92],
			['large_items', 'Baby grand piano', 'Salon Grand piano', 311],
			['large_items', 'Upright piano', 'Piano droit', 9],
			['large_items', 'Grand Piano', 'Grand piano', 495],
			['garden', 'Parasol', 'Parasol', 6],
			['garden', 'Lawnmower', 'Tondeuse', 5],
			['garden', 'Sun lounger', 'Balancelle', 18],
			['garage', 'Tools', 'Outils', 21],
			['garage', 'Workmate', 'Workmate', 17],
			['miscellaneous', 'Bedside table', 'Table de chevet', 9],
			['miscellaneous', 'Dressing table', 'Coiffeuse', 18],
			['miscellaneous', 'Chest of Drawers', 'Commode de tiroirs', 4],
			['miscellaneous', 'Work bench', 'Table de travail', 45],
			['miscellaneous', 'Shelves', 'Étagères', 25],
			['miscellaneous', 'Halogen light', 'Lumière halogène', 3],
			['miscellaneous', 'Medicine cabinet', 'Cabinet médical', 5],
			['miscellaneous', 'Light', 'Lampe', 1],
			['miscellaneous', 'Painting', 'Peinture', 3],
			['miscellaneous', 'Rug', 'Petit tapis', 6],
			['general', 'Storage box', 'Caisee', 1],
			['general', 'Wardrobe box', 'Caisse garde-robe', 36],
		];

		foreach($data as $item) {
	    	$insert['category'] = $item[0];
	    	$insert['en']['name'] = $item[1];
	    	$insert['fr']['name'] = $item[2];
	    	$insert['volume'] = $item[3];

	    	$this->volumeRepository->create($insert);
    	}

		Model::reguard();
	}

}
