<?php

namespace App\ActionClass;

class GenerateOrderCodeAction
{

    public static function execute()
    {
        $order_code = md5(uniqid(rand(), true));
        return $order_code;
    }
}
