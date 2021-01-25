<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class GeneratePaymentInfoAction
{

    public static function execute(Order $order): array
    {
        $payment = [
            'reference' => $order->order_code,
            'description' => 'Description',
            'amount' => [
                'currency' => 'USD',
                'total' => $order->total_amount,
            ],
            'allowPartial' => false,
        ];

        return $payment;
    }
}
