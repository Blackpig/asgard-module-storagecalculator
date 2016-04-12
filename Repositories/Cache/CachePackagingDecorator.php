<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\PackagingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePackagingDecorator extends BaseCacheDecorator implements PackagingRepository
{
    public function __construct(PackagingRepository $packaging)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.packagings';
        $this->repository = $packaging;
    }
}
