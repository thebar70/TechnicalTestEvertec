<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class GeneratePaymentInfoAction
{
    /**
     * Generate payment data based on the order
     * 
     * @param App\Models\Order $order
     * @return array
     */
    public static function execute(Order $order): array
    {
        $payment = [
            'reference' => $order->order_code,
            'description' => config('my_store.payment_description'),
            'amount' => [
                'currency' => config('my_store.currency'),
                'total' => $order->total_amount,
            ],
            'allowPartial' => config('my_store.allow_partial_payment'),
        ];

        return $payment;
    }
}
