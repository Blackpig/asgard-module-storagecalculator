<?php namespace Modules\StorageCalculator\Repositories\Cache;

use Modules\StorageCalculator\Repositories\VolumesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheVolumesDecorator extends BaseCacheDecorator implements VolumesRepository
{
    public function __construct(VolumesRepository $volumes)
    {
        parent::__construct();
        $this->entityName = 'storagecalculator.volumes';
        $this->repository = $volumes;
    }
}
