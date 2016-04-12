<?php namespace Modules\StorageCalculator\Repositories\Eloquent;

use Modules\StorageCalculator\Support\Traits\IntegerTrait;
use Modules\StorageCalculator\Repositories\StorageRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentStorageRepository extends EloquentBaseRepository implements StorageRepository
{
    use IntegerTrait;

    /**
     * @param  int    $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->with('discounts')->find($id);
    }

    /**
     * Update a resource
     * @param $storage
     * @param  array $data
     * @return mixed
     */
    public function update($storage, $data)
    {
        $data['unit_price'] = $this->convertToInt($data['unit_price']);
        $storage->update($data);

        return $storage;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
        $data['unit_price'] = $this->convertToInt($data['unit_price']);
        $storage = $this->model->create($data);

        return $storage;
    }
}
