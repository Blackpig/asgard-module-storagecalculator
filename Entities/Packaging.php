<?php namespace Modules\StorageCalculator\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Packaging extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'storagecalculator__packagings';
    public $translatedAttributes = ['name', 'blurb', 'unit'];
    protected $fillable = ['name', 'blurb', 'unit_price', 'unit'];

    protected $presenter = 'Modules\StorageCalculator\Presenters\PackagingPresenter';

    public function getUnitPriceAttribute($value)
    {
        return $value/100;
    }
}
