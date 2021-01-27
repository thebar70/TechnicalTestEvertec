<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\IPlacetopay;
use App\Models\Order;

class PlacetopayController extends Controller
{
    /**
     * Service manager for Placetopay api
     * 
     * @var App\Interfaces\Api\IPlacetopay $placetopay_manager
     */
    protected $placetopay_manager;

    /**
     * Service Controller for Placetopay api
     * 
     * @param App\Interfaces\Api\IPlacetopay $placetopay_manager
     */
    public function __construct(IPlacetopay $placetopay_manager)
    {
        $this->placetopay_manager = $placetopay_manager;
    }

    /**
     * Receives user redirect from placetopay
     * 
     * @param App\Models\Order $order
     */
    public function paymentCallback(Order $order)
    {
        $this->placetopay_manager->checkPaymentStatus($order);

        return redirect(route('order.show', [$order->id]));
    }
}
