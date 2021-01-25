<?php

use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 *  Product route
 * 
 *  @middleware none
 *  @prefix product
 */
Route::group(['prefix' => 'product'], function () {
    Route::get('show/{product}', [ProductController::class, 'showProduct'])->name('product.show');
    Route::get('list/', [ProductController::class, 'listProducts'])->name('product.list');
});

/**
 *  Order route
 * 
 *  @middleware none
 *  @prefix order
 */
Route::group(['prefix' => 'order'], function () {
    Route::post('store/', [OrderController::class, 'storeOrder'])->name('order.store');
    Route::get('show/{order}', [OrderController::class, 'showOrder'])->name('order.show');
    Route::post('pay/{order}', [OrderController::class, 'pay'])->name('order.pay');
});


