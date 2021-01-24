<?php

namespace App\Providers;

use App\Interfaces\IOrder;
use Illuminate\Support\ServiceProvider;
use App\Services\Web\ProductImpl;
use App\Services\Web\OrderImpl;
use App\Interfaces\IProduct;



class EvertecServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProduct::class, ProductImpl::class);
        $this->app->bind(IOrder::class, OrderImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
