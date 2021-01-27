<?php

namespace App\ActionClass\Order;

class GenerateOrderCodeAction
{
    /**
     * Generate a unique code based on server clock microseconds and md5
     * 
     * @return string
     */
    public static function execute(): string
    {
        $order_code = md5(uniqid(rand(), true));
        return $order_code;
    }
}
