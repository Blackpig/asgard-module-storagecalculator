<?php namespace Modules\StorageCalculator\Entities;

use Illuminate\Database\Eloquent\Model;

class StorageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'storagecalculator__storage_translations';
}
