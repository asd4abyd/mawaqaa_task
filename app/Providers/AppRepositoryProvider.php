<?php

namespace App\Providers;

use App\Repository\Eloquent\UserLocation;
use App\Repository\UserLocationInterface;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserLocationInterface::class, UserLocation::class);

    }
}
