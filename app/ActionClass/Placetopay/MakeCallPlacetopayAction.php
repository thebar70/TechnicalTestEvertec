<?php

namespace App\ActionClass\Placetopay;

use App\Exceptions\RedirectPlacetopayException;
use Illuminate\Support\Facades\Http;

class MakeCallPlacetopayAction
{

    public static function execute($field, $url, $data)
    {
        $response = Http::post($url, $data);
        $status = $response->getStatusCode();
        $redirect_url = '';
        if ($status == 200) {
            try {

                $content = $response->getBody()->getContents();
                $res = json_decode($content);
                $redirect_url = $res->{$field};
            } catch (\Throwable $e) {

                $reason = 'failed to get ' . $field . ' from response';
                $data = $content;

                throw new RedirectPlacetopayException($reason, $data);
            }
        }
        return $redirect_url;
    }
}
