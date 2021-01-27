<?php

namespace App\Providers;

use App\Interfaces\Api\IPlacetopay as ApiIPlacetopay;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Web\IPlacetopay;
use App\Interfaces\Web\IProduct;
use App\Interfaces\Web\IOrder;

use App\Services\Api\PlacetopayImpl as ApiPlacetopayImpl;
use App\Services\Web\PlacetopayImpl;
use App\Services\Web\ProductImpl;
use App\Services\Web\OrderImpl;


class EvertecServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiIPlacetopay::class, ApiPlacetopayImpl::class);
        $this->app->bind(IPlacetopay::class, PlacetopayImpl::class);
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
