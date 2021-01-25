<?php

namespace App\Interfaces\Web;

use App\Models\Order;

interface IOrder
{
    public function storeOrder(array $data): Order;
}
