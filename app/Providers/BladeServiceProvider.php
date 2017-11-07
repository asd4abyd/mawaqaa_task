<?php

namespace App\Providers;

use App\Repository\Eloquent\Shop;
use App\Repository\ShopInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasShop', function() {
            return boolval(shop()->getOneByUserId());

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }
}
