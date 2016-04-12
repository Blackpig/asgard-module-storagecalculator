<?php namespace Modules\StorageCalculator\Presenters;

use Laracasts\Presenter\Presenter;

class VolumesPresenter extends Presenter
{

    public function volumeForDisplay()
    {
        return $this->volume . ' '. $this->addUnits();
    }


    private function addUnits()
    {
        return '&nbspm<sup>3</sup>';
    }

}
