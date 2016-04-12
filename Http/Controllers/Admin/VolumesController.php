<?php namespace Modules\StorageCalculator\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\StorageCalculator\Entities\Volumes;
use Modules\StorageCalculator\Http\Requests\VolumesRequest;
use Modules\StorageCalculator\Repositories\VolumesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class VolumesController extends AdminBaseController
{
    /**
     * @var VolumesRepository
     */
    private $volumes;

    public function __construct(VolumesRepository $volumes)
    {
        parent::__construct();

        $this->volumes = $volumes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $volumes = $this->volumes->all();

        return view('storagecalculator::admin.volumes.index', compact('volumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = config('storagecalculator.volume_categories');
        return view('storagecalculator::admin.volumes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(VolumesRequest $request)
    {
        $this->volumes->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('storagecalculator::volumes.title.volumes')]));

        return redirect()->route('admin.storagecalculator.volumes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Volumes $volumes
     * @return Response
     */
    public function edit(Volumes $volumes)
    {
        $categories = config('storagecalculator.volume_categories');
        return view('storagecalculator::admin.volumes.edit', compact('volumes','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Volumes $volumes
     * @param  Request $request
     * @return Response
     */
    public function update(Volumes $volumes, VolumesRequest $request)
    {
        $this->volumes->update($volumes, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('storagecalculator::volumes.title.volumes')]));

        return redirect()->route('admin.storagecalculator.volumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Volumes $volumes
     * @return Response
     */
    public function destroy(Volumes $volumes)
    {
        $this->volumes->destroy($volumes);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('storagecalculator::volumes.title.volumes')]));

        return redirect()->route('admin.storagecalculator.volumes.index');
    }
}
