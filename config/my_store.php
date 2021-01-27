<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuration file for MyStore.com
    |--------------------------------------------------------------------------
    |
    |
    | General configuration
    |
    */

    'currency' => env('CURRENCY_MY_STORE', null),
    'allow_partial_payment' => env('ALLOW_PARTIAL_PAYMENT', false),
    'payment_description' => env('PAYMENT_DESCRIPTION', ''),
    'order_status' => [
        'created' => env('STATUS_CREATED', 'created'),
        'payed' => env('STATUS_PAYED', 'payed'),
        'rejected' => env('STATUS_REJECTED', 'rejected'),
        'waiting_response' => env('STATUS_WAITING_RESPONSE', 'waiting_response'),
    ]
];
