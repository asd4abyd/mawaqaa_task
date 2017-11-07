<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::creating(function($user){
            $user->created_at=time();
            $user->type = User::TYPE_USER;
         });



        \App\Permission::creating(function($permission){
            $permission->level=User::TYPE_USER;
        });

        \App\UserLocations::creating(function($location){
            $location->created_at=time();
         });

        \App\Shops::creating(function($shop){
            $shop->user_id=auth()->user()->id;
            $shop->created_at=time();
            $shop->is_active=1;
         });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
