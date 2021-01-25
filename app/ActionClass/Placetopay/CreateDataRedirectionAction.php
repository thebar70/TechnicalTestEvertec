<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class CreateDataRedirectionAction
{

    public static function execute($request, Order $order): array
    {
        $auth = GenerateAuthPlacetopayAction::execute();
        $expiration = $auth['expiration'];
        unset($auth['expiration']);
        $data = [
            'auth' => $auth,
            'locale' => 'en_CO',
            'buyer' => GenerateBuyerInfoAction::execute($order),
            'payment' => GeneratePaymentInfoAction::execute($order),
            'expiration' => $expiration,
            'returnUrl' => config('placetopay.url.callback'),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->userAgent(),
        ];
        ValidateDataRedirectAction::execute($data);

        return $data;
    }
}
