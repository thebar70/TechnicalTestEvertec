<?php

namespace App\Interfaces\Web;

use Illuminate\Support\Collection;
use App\Models\Order;

interface IOrder
{
    public function storeOrder(array $data): Order;
    public function listOrders(): Collection;
}
