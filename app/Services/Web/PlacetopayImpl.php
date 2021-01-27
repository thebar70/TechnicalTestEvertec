<?php

namespace App\Services\Web;

use App\ActionClass\Placetopay\CreateDataRedirectionAction;
use App\ActionClass\Placetopay\CallPlacetopayAction;
use App\ActionClass\Payment\CreatePaymentAction;
use App\Exceptions\RedirectPlacetopayException;

use App\Interfaces\Web\IPlacetopay;
use App\Models\Payment;
use App\Models\Order;

class PlacetopayImpl implements IPlacetopay
{

    /**
     * Generate a redirect url to make a payment
     * Check the current status of the payment and if the processing url is still valid
     * 
     * @param Illuminate\Http\Request $request
     * @param App\Models\Order $order
     * @return string
     */
    public function generateRedirectUrl($request, Order $order): string
    {
        $order->waiting_status_response = true;
        $order->save();
        
        if (
            $order->payment &&
            ($order->payment->status == Payment::PAYMENT_STATUS_PENDING || $order->payment->status == Payment::PAYMENT_STATUS_WAITING_RESPONSE)
        ) {
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
        CreatePaymentAction::execute($order, $data, $content);

        return $content->processUrl;
    }
}
