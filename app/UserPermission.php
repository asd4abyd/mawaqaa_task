<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserPermission
 * @package App
 * @mixin \Eloquent
 */
class UserPermission extends Model
{

    const LEVEL_ADMIN         = 0;
    const LEVEL_ASSISTANT     = 1;
    const LEVEL_SHOP_OWNER    = 2;
    const LEVEL_SHOP_OPERATOR = 3;
    
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

}
