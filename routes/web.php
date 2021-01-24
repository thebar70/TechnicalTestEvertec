<?php

use App\Http\Controllers\Web\ProductController;
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

Route::group(['prefix' => 'product'], function () {
    Route::get('show/{product}', [ProductController::class, 'showProduct'])->name('product.show');
    Route::get('list/', [ProductController::class, 'listProducts'])->name('product.list');
});
