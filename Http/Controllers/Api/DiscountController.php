<?php namespace Modules\StorageCalculator\Http\Controllers\Api;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\StorageCalculator\Repositories\DiscountsRepository;

class DiscountController extends Controller
{
    /**
     * @var Repository
     */
    private $cache;
    /**
     * @var DiscountRepository
     */
    private $discount;

    public function __construct(Repository $cache, DiscountsRepository $discount)
    {
        $this->cache = $cache;
        $this->discount = $discount;
    }

    /**
     * Delete a menu item
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        $discount = $this->discount->find($request->get('discountItem'));

        if (! $discount) {
            return Response::json(['errors' => true]);
        }

        $this->discount->destroy($discount);

        return Response::json(['errors' => false]);
    }
}
