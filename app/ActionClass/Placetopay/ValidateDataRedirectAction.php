<?php

namespace App\ActionClass\Placetopay;

use App\Exceptions\RedirectPlacetopayException;

class ValidateDataRedirectAction
{

    public static function execute(array $data)
    {
        //First level array
        $validation = [
            'auth' => isset($data['auth']) ? 0 : 1,
            'locale' => isset($data['locale']) ? 0 : 1,
            'buyer' => isset($data['buyer']) ? 0 : 1,
            'payment' => isset($data['payment']) ? 0 : 1,
            'expiration' => isset($data['expiration']) ? 0 : 1,
            'returnUrl' => isset($data['returnUrl']) ? 0 : 1,
            'ipAddress' => isset($data['ipAddress']) ? 0 : 1,
            'userAgent' => isset($data['userAgent']) ? 0 : 1,
        ];
        /* dd(array_count_values($validation));
        if (array_count_values($validation) > 0) {
            $reason = 'missing keys to request redirect';
            throw new RedirectPlacetopayException($reason, $validation);
        } */
    }
}
