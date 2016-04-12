<?php namespace Modules\StorageCalculator\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\StorageCalculator\Support\traits\UnitCostTrait;

class StoragePresenter extends Presenter
{
    use UnitCostTrait;
}
