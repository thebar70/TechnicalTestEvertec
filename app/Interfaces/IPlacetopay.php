<?php

namespace App\Interfaces;

use App\Models\Order;

interface IPlacetopay
{
    public function createDataRedirect(Order $order): array;
}
