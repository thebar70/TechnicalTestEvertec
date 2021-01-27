<?php

namespace App\Interfaces\Api;

use App\Models\Order;

interface IPlacetopay
{
    /**
     * @param App\Models\Order $order
     */
    public function checkPaymentStatus(Order $order);
}
