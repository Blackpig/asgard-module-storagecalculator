<?php namespace Modules\StorageCalculator\Entities;

use Illuminate\Database\Eloquent\Model;

class PackagingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'blurb', 'unit'];
    protected $table = 'storagecalculator__packaging_translations';
}
