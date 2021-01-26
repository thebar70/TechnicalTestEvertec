<?php

namespace App\Services\Web;

use App\ActionClass\Order\GenerateOrderCodeAction;
use App\Interfaces\Web\IOrder;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Collection;

class OrderImpl implements IOrder
{
    /**
     * Allow store order
     * @return App\Models\Order
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
        //$order->customer_document = $faker->nam;
        //$order->customer_surname = $data['customer_surname'];
        //$order->customer_document_type = $data['customer_document_type'];
        $order->status = Order::STATUS_CREATED;
        $order->total_amount = $product->price;
        $order->product_id = $product->id;

        $order->save();

        return $order;
    }

    /**
     * Returns a list of orders
     * @return Illuminate\Support\Collection
     */
    public function listOrders(): Collection
    {
        $orders = Order::all();

        return $orders;
    }
}
