<?php namespace Modules\StorageCalculator\Repositories\Eloquent;

use Modules\StorageCalculator\Support\Traits\IntegerTrait;
use Modules\StorageCalculator\Repositories\VolumesRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentVolumesRepository extends EloquentBaseRepository implements VolumesRepository
{
    use IntegerTrait;

    /**
     * Update a resource
     * @param $volume
     * @param  array $data
     * @return mixed
     */
    public function update($volume, $data)
    {
        $data['volume'] = $this->convertToInt($data['volume']);
        $volume->update($data);

        return $volume;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
        $data['volume'] = $this->convertToInt($data['volume']);
        $volume = $this->model->create($data);

        return $volume;
    }

}
