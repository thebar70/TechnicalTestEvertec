<?php

namespace App\ActionClass\Placetopay;

use App\Models\Order;

class CreateDataRedirectionAction
{
    /**
     * Generate data for redirect url request for placetopay
     * 
     * @param Illuminate\Http\Request $request
     * @param App\Models\Order $order
     * @return array
     */
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
            'returnUrl' => config('placetopay.url.callback') . $order->id,
            'ipAddress' => $request->ip(),
            'userAgent' => $request->userAgent(),
        ];
        
        return $data;
    }
}
