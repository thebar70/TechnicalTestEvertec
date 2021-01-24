<?php

namespace App\Services\Web;

use App\ActionClass\GenerateOrderCodeAction;
use App\Interfaces\IOrder;
use App\Models\Order;
use App\Models\Product;

class OrderImpl implements IOrder
{
    /**
     * Returns a list of products
     * @return Illuminate\Support\Collection
     */
    public function storeOrder($data): Order
    {
        $product = Product::find($data['product_id']);
        $order_code = GenerateOrderCodeAction::execute();

        $order = new Order();
        $order->order_code = $order_code;
        $order->customer_name = $data['customer_name'];
        $order->customer_email = $data['customer_email'];
        $order->customer_mobile = $data['customer_mobile'];
        $order->status = Order::STATUS_CREATED;
        $order->total_amount = $product->price;
        $order->product_id = $product->id;

        $order->save();

        return $order;
    }
}
