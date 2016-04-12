<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\Discount_quantityRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDiscount_quantityDecorator extends BaseCacheDecorator implements Discount_quantityRepository
{
    public function __construct(Discount_quantityRepository $discount_quantity)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.discount_quantities';
        $this->repository = $discount_quantity;
    }
}
