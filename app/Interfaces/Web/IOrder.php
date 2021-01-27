<?php

namespace App\Interfaces\Web;

use Illuminate\Support\Collection;
use App\Models\Order;

interface IOrder
{
    /**
     * @param array $data
     * 
     * @return App\Models\Order
     */
    public function storeOrder(array $data): Order;

    /**
     * @return Illuminate\Support\Collection
     */
    public function listOrders(): Collection;
}
