<?php

namespace App\Services\Web;

use App\ActionClass\Payment\CreatePaymentAction;
use App\ActionClass\Placetopay\CreateDataRedirectionAction;
use App\ActionClass\Placetopay\CallPlacetopayAction;
use App\Exceptions\RedirectPlacetopayException;
use App\Interfaces\Web\IPlacetopay;
use App\Models\Order;
use App\Models\Payment;

class PlacetopayImpl implements IPlacetopay
{
    /**
     * Generate a redirect url to make a payment
     * 
     * @param request
     * @param App\Models\Order
     * @return array
     */
    public function generateRedirectUrl($request, Order $order): string
    {
        if ($order->payment && $order->payment->status == Payment::PAYMENT_STATUS_PENDING) {
            return $order->payment->processUrl;
        }
        
        $data = CreateDataRedirectionAction::execute($request, $order);
        $session_placetopay_url = config('placetopay.url.base');
        if (!$session_placetopay_url) {
            $reason = 'Url placetopay not found';
            $data = [];
            throw new RedirectPlacetopayException($reason, $data);
        }

        $content = CallPlacetopayAction::execute($session_placetopay_url, $data);
        CreatePaymentAction::execute($order->id, $data, $content);
        
        return $content->processUrl;
    }
}
