<?php namespace Modules\StorageCalculator\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\StorageCalculator\Entities\Storage;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\StorageCalculator\Http\Requests\StorageRequest;
use Modules\StorageCalculator\Repositories\StorageRepository;

class StorageController extends AdminBaseController
{
    /**
     * @var StorageRepository
     */
    private $storage;

    public function __construct(StorageRepository $storage)
    {
        parent::__construct();

        $this->storage = $storage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $storages = $this->storage->all();

        return view('storagecalculator::admin.storages.index', compact('storages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('storagecalculator::admin.storages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(StorageRequest $request)
    {
        $this->storage->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('storagecalculator::storages.title.storages')]));

        return redirect()->route('admin.storagecalculator.storage.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Storage $storage
     * @return Response
     */
    public function edit(Storage $storage)
    {
         return view('storagecalculator::admin.storages.edit', compact('storage', 'discounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Storage $storage
     * @param  Request $request
     * @return Response
     */
    public function update(Storage $storage, StorageRequest $request)
    {
        $this->storage->update($storage, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('storagecalculator::storages.title.storages')]));

        return redirect()->route('admin.storagecalculator.storage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Storage $storage
     * @return Response
     */
    public function destroy(Storage $storage)
    {
        $this->storage->destroy($storage);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('storagecalculator::storages.title.storages')]));

        return redirect()->route('admin.storagecalculator.storage.index');
    }
}
