<?php namespace Modules\StorageCalculator\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\StorageCalculator\Entities\Packaging;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\StorageCalculator\Http\Requests\PackagingRequest;
use Modules\StorageCalculator\Repositories\PackagingRepository;

class PackagingController extends AdminBaseController
{
    /**
     * @var PackagingRepository
     */
    private $packaging;

    public function __construct(PackagingRepository $packaging)
    {
        parent::__construct();

        $this->packaging = $packaging;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $packagings = $this->packaging->all();

        return view('storagecalculator::admin.packagings.index', compact('packagings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('storagecalculator::admin.packagings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(PackagingRequest $request)
    {
        $this->packaging->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('storagecalculator::packagings.title.packagings')]));

        return redirect()->route('admin.storagecalculator.packaging.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Packaging $packaging
     * @return Response
     */
    public function edit(Packaging $packaging)
    {
        return view('storagecalculator::admin.packagings.edit', compact('packaging'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Packaging $packaging
     * @param  Request $request
     * @return Response
     */
    public function update(Packaging $packaging, PackagingRequest $request)
    {
        $this->packaging->update($packaging, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('storagecalculator::packagings.title.packagings')]));

        return redirect()->route('admin.storagecalculator.packaging.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Packaging $packaging
     * @return Response
     */
    public function destroy(Packaging $packaging)
    {
        $this->packaging->destroy($packaging);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('storagecalculator::packagings.title.packagings')]));

        return redirect()->route('admin.storagecalculator.packaging.index');
    }
}
