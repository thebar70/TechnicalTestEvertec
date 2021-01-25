<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class GenerateBuyerInfoAction
{

    public static function execute(Order $order): array
    {
        $buyer = [
            'name' => $order->customer_name,
            'surname' => 'test',
            'email' => $order->customer_email,
            'document' => 12345678,
            'documentType' => 'CC',
            'mobile' => 1234345345,
        ];

        return $buyer;
    }
}
