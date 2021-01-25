<?php

namespace App\Services\Web;

use App\ActionClass\Placetopay\CreateDataRedirectionAction;
use App\ActionClass\Placetopay\MakeCallPlacetopayAction;
use App\Exceptions\RedirectPlacetopayException;
use App\Interfaces\Web\IPlacetopay;
use App\Models\Order;

class PlacetopayImpl implements IPlacetopay
{
    /**
     * Generate a redirect url to make a payment
     * @return array
     */
    public function generateRedirectUrl($request, Order $order): string
    {
        $data = CreateDataRedirectionAction::execute($request, $order);
        $session_placetopay_url = config('placetopay.url.base');
        if (!$session_placetopay_url) {
            $reason = 'url placetopay not found';
            $data = [];
            throw new RedirectPlacetopayException($reason, $data);
        }

        $field = 'processUrl';

        return MakeCallPlacetopayAction::execute($field, $session_placetopay_url, $data);
    }
}
