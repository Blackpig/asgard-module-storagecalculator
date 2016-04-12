<?php namespace Modules\StorageCalculator\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Discounts extends Model
{
    use PresentableTrait;

    protected $table = 'storagecalculator__discounts';
    protected $fillable = ['operand', 'unit', 'amount'];

    protected $presenter = 'Modules\StorageCalculator\Presenters\DiscountsPresenter';

    public function storage()
    {
        return $this->belongsTo('Modules\StorageCalculator\Entities\Storage');
    }


}
