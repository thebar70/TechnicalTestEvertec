<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuration file for Placetopay
    |--------------------------------------------------------------------------
    |
    |
    | Configuration of Data necessary to connect with the payment gateway
    |
    */

    'auth' => [
        'login' => env('PLACETOPAY_LOGIN', null),
        'secret' => env('PLACETOPAY_SECRET', null),
    ],
    'url' => [
        'base' => env('PLACETOPAY_URL_BASE', null),
        'callback' => env('PLACETOPAY_URL_CALLBACK', null),
    ],
    'session' => [
        'expiration_time' => env('PLACETOPAY_SESSION_EXPIRATION_TIME', 10),
    ]

];
