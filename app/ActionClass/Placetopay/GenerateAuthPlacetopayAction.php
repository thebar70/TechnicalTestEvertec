<?php

namespace App\ActionClass\Placetopay;

use Carbon\Carbon;

class GenerateAuthPlacetopayAction
{

    public static function execute(): array
    {
        date_default_timezone_set('America/Bogota');

        $now = new Carbon();
        $now->addMinutes(10);
        $expirired = $now->format('c');

        $seed = date('c');

        $nonce = bin2hex(random_bytes(16));
        $nonceBase64 = base64_encode($nonce);
        $secret = config('placetopay.auth.secret');
        $tranKey = base64_encode(sha1($nonce . $seed . $secret, true));
        return [
            'login' => config('placetopay.auth.login'),
            'tranKey' => $tranKey,
            'nonce' => $nonceBase64,
            'seed' => $seed,
            'expiration' => $expirired
        ];
    }
}
