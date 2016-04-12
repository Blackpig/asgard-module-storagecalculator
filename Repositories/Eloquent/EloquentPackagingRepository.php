<?php namespace Modules\StorageCalculator\Repositories\Eloquent;

use Modules\StorageCalculator\Support\Traits\IntegerTrait;
use Modules\StorageCalculator\Repositories\PackagingRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPackagingRepository extends EloquentBaseRepository implements PackagingRepository
{
    use IntegerTrait;

    /**
     * Update a resource
     * @param $packaging
     * @param  array $data
     * @return mixed
     */
    public function update($packaging, $data)
    {
        $data['unit_price'] = $this->convertToInt($data['unit_price']);
        $packaging->update($data);

        return $packaging;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
        $data['unit_price'] = $this->convertToInt($data['unit_price']);
        $packaging = $this->model->create($data);

        return $packaging;
    }
}
