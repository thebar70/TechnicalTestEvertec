<?php

namespace App\Services\Web;

use App\ActionClass\Placetopay\GenerateAuthPlacetopayAction;
use App\ActionClass\Placetopay\GenerateBuyerInfoAction;
use App\ActionClass\Placetopay\GeneratePaymentInfoAction;
use App\Interfaces\IPlacetopay;
use App\Models\Order;

class PlacetopayImpl implements IPlacetopay
{
    /**
     * Returns the redirect data to placetopay
     * @return array
     */
    public function createDataRedirect(Order $order): array
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
            'returnUrl' => 'http://localhost/TechnicalTestEvertec/public/api/placetopay/payment/callback/',
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'PlacetoPay Sandbox'
        ];

        return $data;
    }
}
