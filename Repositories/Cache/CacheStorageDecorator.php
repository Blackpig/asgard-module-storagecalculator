<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\StorageRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStorageDecorator extends BaseCacheDecorator implements StorageRepository
{
    public function __construct(StorageRepository $storage)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.storages';
        $this->repository = $storage;
    }
}
