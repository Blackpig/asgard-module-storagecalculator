<?php namespace Modules\StorageCalculator\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class VolumesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'category' => 'required',
            'volume' => 'required',
        ];
    }

    public function translationRules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function translationMessages()
    {
        return [
            'category.required' => trans('storagecalculator::volumes.messages.category is required'),
            'name.required' => trans('storagecalculator::volumes.messages.name is required'),
            'volume.required' => trans('storagecalculator::volumes.messages.testimonial is required'),
        ];
    }
}
