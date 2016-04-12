<?php namespace Modules\StorageCalculator\Support\Traits;

trait IntegerTrait
{
    public static function convertToInt($value)
    {
        return $value * 100;
    }

    public static function convertToDecimal($value)
    {
        return $value * 100;
    }
}
