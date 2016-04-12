<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\Discount_flatRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDiscount_flatDecorator extends BaseCacheDecorator implements Discount_flatRepository
{
    public function __construct(Discount_flatRepository $discount_flat)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.discount_flats';
        $this->repository = $discount_flat;
    }
}
