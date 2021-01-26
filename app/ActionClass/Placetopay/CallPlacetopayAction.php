<?php

namespace App\ActionClass\Placetopay;

use App\Exceptions\CallPlacetopayException;
use App\Exceptions\RedirectPlacetopayException;
use Illuminate\Support\Facades\Http;
use stdClass;

class CallPlacetopayAction
{

    public static function execute($url, $data)
    {
        $response = Http::post($url, $data);
        $status = $response->getStatusCode();
        $content = new stdClass();
        if ($status !== 200) {
            $reason = 'Failed to get response';
            $data = $content;
            throw new CallPlacetopayException($reason, $data);
        }

        try {
            $json_content = $response->getBody()->getContents();
            $content = json_decode($json_content);
        } catch (\Throwable $e) {
            $reason = 'failed to get response';
            $data = $content;

            throw new CallPlacetopayException($reason, $data);
        }

        return $content;
    }
}
