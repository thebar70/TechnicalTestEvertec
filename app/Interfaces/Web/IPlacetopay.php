<?php

namespace App\Interfaces\Web;

use App\Models\Order;

interface IPlacetopay
{
    /**
     * @param Illuminate\Http\Request $request
     * @param App\Models\Order $order
     * @return string
     */
    public function generateRedirectUrl($request, Order $order): string;
}
