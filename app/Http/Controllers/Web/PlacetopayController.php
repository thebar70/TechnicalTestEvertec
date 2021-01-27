<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\IPlacetopay;
use Illuminate\Http\Request;
use App\Models\Order;

class PlacetopayController extends Controller
{

    /**
     * Service handler for the placetopay web
     * 
     * @var App\Interfaces\Web\IPlacetopay $placetopay_manager
     */
    protected $placetopay_manager;

    /**
     * Service controller for the pĺacetopay web
     * 
     * @param App\Interfaces\Web\IPlacetopay $placetopay_manager
     */

    public function __construct(IPlacetopay $placetopay_manager)
    {
        $this->placetopay_manager = $placetopay_manager;
    }

    /**
     * Redirect user to payment site
     * 
     * @param Illuminate\Http\Request $request
     * @param App\Models\Order $order
     * */
    public function redirecToPaymentSite(Request $request, Order $order)
    {
        $url = $this->placetopay_manager->generateRedirectUrl($request, $order);

        return redirect($url);
    }
}
