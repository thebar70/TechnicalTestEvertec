<?php

namespace App\Services\Api;

use App\ActionClass\Placetopay\GenerateAuthPlacetopayAction;
use App\ActionClass\Placetopay\CallPlacetopayAction;
use App\Exceptions\CheckPaymentStatusException;
use App\Interfaces\Api\IPlacetopay;
use App\Models\Payment;
use App\Models\Order;


class PlacetopayImpl implements IPlacetopay
{

    /**
     * Check the status of the payment with a call to placetopay
     * 
     * @param App\Models\Order $order
     */
    public function checkPaymentStatus(Order $order)
    {
        $paymet_status_url = config('placetopay.url.payment_status');
        if (!$paymet_status_url || !$order->payment) {
            $reason = 'No data found';
            $data = [
                'paymet_status_url' => $paymet_status_url,
                'payment_order' => $order->payment,
            ];
            throw new CheckPaymentStatusException($reason, $data);
        }

        if ($paymet_status_url) {
            $auth = GenerateAuthPlacetopayAction::execute();
            $data = ['auth' => $auth];
            $url = $paymet_status_url . $order->payment->requestId;
            $content = CallPlacetopayAction::execute($url, $data);


            switch ($content->status->status) {
                case 'REJECTED':
                    $order->status = Order::STATUS_REJECTED;
                    $order->payment->status = Payment::PAYMENT_STATUS_REJECTED;
                    break;
                case 'APPROVED':
                    $order->status = Order::STATUS_PAYED;
                    $order->payment->status = Payment::PAYMENT_STATUS_APPROVED;
                    break;
                case 'FAILED':
                    $order->status = Order::STATUS_REJECTED;
                    $order->payment->status = Payment::PAYMENT_STATUS_FAILED;
                    break;
                case 'PENDING':
                    if ($content->status->reason == 'PT') {
                        $order->payment->status = Payment::PAYMENT_STATUS_WAITING_RESPONSE;
                    }
                    break;
                default:
                    # code...
                    break;
            }

            $order->waiting_status_response = false;

            $order->payment->save();
            $order->save();
        }
    }
}
