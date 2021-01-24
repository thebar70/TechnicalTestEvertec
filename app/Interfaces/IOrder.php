<?php

namespace App\Interfaces;

use App\Models\Order;

interface IOrder
{
    public function storeOrder(array $data): Order;
}
