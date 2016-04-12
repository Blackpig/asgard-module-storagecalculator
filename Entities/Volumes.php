<?php namespace Modules\StorageCalculator\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Volumes extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'storagecalculator__volumes';
    protected $presenter = 'Modules\StorageCalculator\Presenters\VolumesPresenter';

    public $translatedAttributes = ['name'];
    protected $fillable = ['category', 'name', 'volume'];

    public function getVolumeAttribute($value)
    {
        return $value/100;
    }
}
