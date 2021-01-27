<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Interfaces\Web\IOrder;
use App\Models\Order;

class OrderController extends Controller
{

    /**
     * Service handler for the order
     * 
     * @var App\Interfaces\Web\IOrder $order_manager
     */
    protected $order_manager;

    /**
     * Service controller for the order
     * 
     * @param App\Interfaces\Web\IOrder $order_manager
     */
    public function __construct(IOrder $order_manager)
    {
        $this->order_manager = $order_manager;
    }

    /**
     *  Finds a order and returns it with a view
     * 
     * @param App\Models\Order $order
     */
    public function showOrder(Order $order)
    {

        return view('order.show')->with(compact('order'));
    }

    /**
     *  Generate a orders list
     * 
     */
    public function listOrders()
    {
        $orders = $this->order_manager->listOrders();
        
        return view('order.list')->with(compact('orders'));
    }

    /**
     * Stores a product order and returns a view with the information
     * 
     * @param App\Requests\OrderRequest $request
     */
    public function storeOrder(OrderRequest $request)
    {
        $order = $this->order_manager->storeOrder($request->all());

        return redirect()->route('order.show', $order->id);
    }
}
