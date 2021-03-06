<?php

use App\Http\Controllers\Api\PlacetopayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 *  placetopay route
 * 
 *  @middleware none
 *  @prefix placetopay
 */
Route::group(['prefix' => 'placetopay'], function () {
    Route::get('payment/callback/{order}', [PlacetopayController::class, 'paymentCallback']);
    
});
