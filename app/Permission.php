<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App
 * @mixin \Eloquent
 */
class Permission extends Model
{
    public $timestamps = false;
    protected $fillable= ['title'];

    public function user()
    {
        return $this->hasMany('App\UserPermission');
    }
}
