<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\IPlacetopay;
use Illuminate\Http\Request;
use App\Models\Order;

class PlacetopayController extends Controller
{
    protected $placetopay_manager;

    public function __construct(IPlacetopay $placetopay_manager)
    {
        $this->placetopay_manager = $placetopay_manager;
    }

    /**
     * Redirect user to payment site
     * 
     * @param Illuminate\Http\Request
     * @param App\Models\Order
     * */
    public function redirecToPaymentSite(Request $request, Order $order)
    {
        $url = $this->placetopay_manager->generateRedirectUrl($request, $order);

        return redirect($url);
    }
}
