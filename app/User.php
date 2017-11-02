<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;


    const TYPE_ADMIN=1;
    const TYPE_USER=2;


    const PROVIDER_LOCAL    = 0;
    const PROVIDER_FACEBOOK = 1;
    const PROVIDER_TWITTER  = 2;
    const PROVIDER_GPLUS    = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password',
        'last_name', 'provider', 'language',
        'country', 'address', 'phone', 'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
