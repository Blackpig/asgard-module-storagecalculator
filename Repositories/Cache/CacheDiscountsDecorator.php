<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\DiscountsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDiscountsDecorator extends BaseCacheDecorator implements DiscountsRepository
{
    public function __construct(DiscountsRepository $discounts)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.discounts';
        $this->repository = $discounts;
    }
}
