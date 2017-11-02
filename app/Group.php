<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function permission()
    {
        return $this->hasMany('App\PermissionGroup');
    }
}
