<?php namespace Modules\StorageCalculator\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class PackagingRequest extends BaseFormRequest
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
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function translationMessages()
    {
        return [
            'name.required' => trans('storagecalculator::packaging.messages.name is required'),
            'unit_price.required' => trans('storagecalculator::packaging.messages.unit price is required'),
        ];
    }
}
