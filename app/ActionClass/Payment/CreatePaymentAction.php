<?php

namespace App\ActionClass\Payment;

use App\Models\Payment;

class CreatePaymentAction
{

    public static function execute($order_id, $data, $content)
    {
        $payment = new Payment();

        $payment->order_id = $order_id;
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
