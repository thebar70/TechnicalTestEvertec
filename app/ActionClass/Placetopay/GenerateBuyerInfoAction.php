<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class GenerateBuyerInfoAction
{

    public static function execute(Order $order): array
    {
        $buyer = [
            'name' => $order->customer_name,
            //'surname' => $order->customer_surname,
            'email' => $order->customer_email,
            //'document' => $order->customer_document,
            //'documentType' => $order->customer_document_type,
            'mobile' => $order->customer_mobile,
        ];

        return $buyer;
    }
}
