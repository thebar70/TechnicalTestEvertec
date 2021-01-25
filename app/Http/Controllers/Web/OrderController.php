<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Interfaces\IOrder;
use App\Models\Order;
use App\Services\Web\PlacetopayImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    protected $order_manager;

    public function __construct(IOrder $order_manager)
    {
        $this->order_manager = $order_manager;
    }

    /**
     *  Finds a order and returns it with a view
     * 
     * @param App\Models\Order
     */
    public function showOrder(Order $order)
    {
        return view('order.show')->with(compact('order'));
    }

    /**
     * Stores a product order and returns a view with the information
     * 
     * @param App\Requests\OrderRequest
     */
    public function storeOrder(OrderRequest $request)
    {
        $order = $this->order_manager->storeOrder($request->all());
        return redirect()->route('order.show', $order->id);
    }

    public function pay(Order $order)
    {
        $manager = new PlacetopayImpl();
        $data = $manager->createDataRedirect($order);
        $url = config('placetopay.url.base');
        $json = json_encode($data);
       
        $response = Http::post($url, $data);
        $content=$response->getBody()->getContents();
        $res=json_decode($content);
        return redirect($res->processUrl);
        
        
        
        
    }
}
