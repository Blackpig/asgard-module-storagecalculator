<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\Discount_periodRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDiscount_periodDecorator extends BaseCacheDecorator implements Discount_periodRepository
{
    public function __construct(Discount_periodRepository $discount_period)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.discount_periods';
        $this->repository = $discount_period;
    }
}
