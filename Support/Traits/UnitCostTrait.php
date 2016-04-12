<?php namespace Modules\StorageCalculator\Support\Traits;

trait UnitCostTrait
{
    public function unitCost()
    {
        return ($this->unit_price) . ' '. $this->unit;
    }
}
