<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\PlacetopayImpl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlacetopayController extends Controller
{
    public function paymentCallback(Request $request)
    {
        Log::debug(
            'payment recived',
            [
                'data' => $request->all(),
            ]
        );
    }
}
