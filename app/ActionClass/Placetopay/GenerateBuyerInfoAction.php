<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class GenerateBuyerInfoAction
{
    /**
     * Generates buyer data
     * 
     * @param App\Models\Order $order
     * @return array
     */
    public static function execute(Order $order): array
    {
        $buyer = [
            'name' => $order->customer_name,
            'email' => $order->customer_email,
            'mobile' => $order->customer_mobile,
        ];

        return $buyer;
    }
}
