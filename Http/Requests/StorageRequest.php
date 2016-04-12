<?php namespace Modules\StorageCalculator\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class StorageRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'unit_price' => 'required',
        ];
    }

    public function translationRules()
    {
        return [
            'name' => 'required',
            'unit' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function translationMessages()
    {
        return [
            'name.required' => trans('storagecalculator::storage.messages.name is required'),
            'unit_price.required' => trans('storagecalculator::storage.messages.unit price is required'),
            'unit.required' => trans('storagecalculator::storage.messages.unit is required'),
        ];
    }
}
