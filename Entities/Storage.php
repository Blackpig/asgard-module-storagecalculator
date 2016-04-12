<?php namespace Modules\StorageCalculator\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Storage extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'storagecalculator__storages';
    public $translatedAttributes = ['name', 'blurb', 'unit'];
    protected $fillable = ['name', 'blurb', 'unit_price', 'unit'];

    protected $presenter = 'Modules\StorageCalculator\Presenters\StoragePresenter';

    /**
     * Get the available discounts
     */
    public function discounts()
    {
        return $this->hasMany('Modules\StorageCalculator\Entities\Discounts');
    }

    public function getUnitPriceAttribute($value)
    {
        return $value/100;
    }
}
