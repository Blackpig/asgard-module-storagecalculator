<?php namespace Modules\StorageCalculator\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\StorageCalculator\Entities\Storage;
use Modules\StorageCalculator\Entities\Discounts;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\StorageCalculator\Repositories\StorageRepository;
use Modules\StorageCalculator\Repositories\DiscountsRepository;

class DiscountsController extends AdminBaseController
{
    /**
     * @var DiscountsRepository
     */
    private $discounts;

    public function __construct(DiscountsRepository $discounts)
    {
        parent::__construct();

        $this->discounts = $discounts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($storage_id, $discount_type)
    {
        return view('storagecalculator::admin.discounts.create',compact('storage_id','discount_type'));
    }

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

        $storage->discounts()->save($discount);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('storagecalculator::discount_types.title.discount_types')]));

        return redirect()->route('admin.storagecalculator.storage.edit',[$request->storage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Discounts $discounts
     * @return Response
     */
    public function edit($storage_id, Discounts $discounts)
    {
        $storage = Storage::find($storage_id);

        return view('storagecalculator::admin.discounts.edit', compact('storage','discounts'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  Storage $storage
     * @param  Discounts $discount
     * @param  Request $request
     * @return Response
     */
    public function update(Discounts $discounts, Request $request)
    {
        $this->discounts->update($discounts, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('storagecalculator::discounts.title.discounts')]));

        return redirect()->route('admin.storagecalculator.storage.edit',[$discounts->storage_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Discounts $discounts
     * @return Response
     */
    public function destroy(Discounts $discounts)
    {
        $this->discounts->destroy($discounts);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('storagecalculator::discounts.title.discounts')]));

        return redirect()->route('admin.storagecalculator.storage.edit',[$discounts->storage_id]);
    }
}
