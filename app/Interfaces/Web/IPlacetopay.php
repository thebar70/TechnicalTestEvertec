<?php

namespace App\Interfaces\Web;

use App\Models\Order;

interface IPlacetopay
{
    public function generateRedirectUrl($request, Order $order): string;
}
