<?php

namespace App\Interfaces\Api;

use App\Models\Order;

interface IPlacetopay
{
    public function checkPaymentStatus(Order $order);
}
