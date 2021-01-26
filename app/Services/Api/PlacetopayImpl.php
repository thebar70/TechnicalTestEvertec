<?php

namespace App\Services\Api;

use App\ActionClass\Placetopay\CallPlacetopayAction;
use App\ActionClass\Placetopay\GenerateAuthPlacetopayAction;
use App\Interfaces\Api\IPlacetopay;
use App\Models\Order;

class PlacetopayImpl implements IPlacetopay
{
    /**
     * Returns a list of products
     * @return Illuminate\Support\Collection
     */
    public function checkPaymentStatus(Order $order)
    {
        $paymet_status_url = config('placetopay.url.payment_status');

        if ($paymet_status_url) {
            $auth = GenerateAuthPlacetopayAction::execute();
            $data = ['auth' => $auth];
            $url = $paymet_status_url . $order->requestId;
            $content = CallPlacetopayAction::execute($url, $data);
            switch ($content->status->status) {
                case 'REJECTED':
                    $order->status = Order::STATUS_REJECTED;
                    break;
                case 'APPROVED':
                    $order->status = Order::STATUS_PAYED;
                    break;
                default:
                    # code...
                    break;
            }
            $order->save();
        }
    }
}
