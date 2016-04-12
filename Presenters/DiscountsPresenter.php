<?php namespace Modules\StorageCalculator\Presenters;

use Laracasts\Presenter\Presenter;
class DiscountsPresenter extends Presenter
{
    public function discount($discountType)
    {
        return $this->{$discountType}();
    }

    private function discount_period()
    {
        return "From month {$this->entity->unit} apply a discount of {$this->entity->amount}%";
    }

    private function discount_quantity()
    {
        $unit = $this->ordinal($this->entity->unit);
        return "For the {$unit} unit {$this->entity->operand} apply a {$this->entity->amount}&euro; deduction";
    }

    private function ordinal($num)
    {
    if ( ($num / 10) % 10 != 1 )
    {
        switch( $num % 10 )
        {
            case 1: return $num . 'st';
            case 2: return $num . 'nd';
            case 3: return $num . 'rd';
        }
    }
    return $num . 'th';
}
}
