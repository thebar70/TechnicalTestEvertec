<?php

namespace App\ActionClass\Payment;

use App\Models\Order;
use App\Models\Payment;

class CreatePaymentAction
{
    /**
     * Create a payment for an order based on payment processor data, if it already exists, update it
     * 
     * @param App\Models\Order $order
     * @param $data 
     * @param $content 
     */
    public static function execute($order, $data, $content)
    {

        if ($order->payment) {
            $order->payment->processUrl = $content->processUrl;
            $order->payment->requestId = $content->requestId;
            $order->payment->save();

            return;
        }
        $payment = new Payment();

        $payment->order_id = $order->id;
        $payment->status = Payment::PAYMENT_STATUS_PENDING;
        $payment->processor = Payment::PAYMENT_PROCESSOR_PLACETOPAY;
        $payment->paid = $data['payment']['amount']['total'];
        $payment->currency = $data['payment']['amount']['currency'];
        $payment->description = $data['payment']['description'];
        $payment->processUrl = $content->processUrl;
        $payment->requestId = $content->requestId;

        $payment->save();
    }
}
