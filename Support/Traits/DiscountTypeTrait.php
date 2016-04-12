<?php namespace Modules\StorageCalculator\Support\Traits;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use Modules\StorageCalculator\Entities\Storage;
use Modules\StorageCalculator\Entities\Discounts;
use Modules\StorageCalculator\Entities\Discount_period as DiscountType;

trait DiscountTypeTrait
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $storage = Storage::find($request->storage);

        $discount = Discounts::create($request->all());

        $discount_type = DiscountType::create($request->all());

        $storage->discounts()->save($discount);

        $discount_type->discount()->save($discount);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('storagecalculator::discount_types.title.discount_types')]));

        return redirect()->route('admin.storagecalculator.storage.edit',[$request->storage]);
    }
}
