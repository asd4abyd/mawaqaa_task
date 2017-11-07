<?php

namespace App\Providers;

use App\Permission;
use App\User;
use App\UserPermission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('permission', function($user, $domain){

            $permission = Permission::where(['title'=> $domain])->get();

            if(count($permission)==0){

                Permission::create([
                    'title' => $domain
                ]);

                return false;
            }

            if($user->type == User::TYPE_ADMIN){
                return true;
            }

            $user_permission = UserPermission::
            where('user_id', '=', $user->id)
                ->whereHas('permission', function($permission) use ($domain) {
                    $permission->where('title', $domain);
                })
                ->get();

            return  count($user_permission)>0;
        });
    }
}
