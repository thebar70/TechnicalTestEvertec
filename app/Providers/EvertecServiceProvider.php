<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Web\ProductImpl;
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
