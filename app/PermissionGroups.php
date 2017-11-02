<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PermissionGroup
 *
 * @mixin \Eloquent
 */

class PermissionGroups extends Model
{
    public function group()
    {
        return $this->hasMany('App\Group');
    }

    public function setPermissions($id, array $permissions){

        $Set =[];

        foreach($permissions as $val) {
            $Set[] = [
                'group_id'      => $id,
                'permission_id' => $val
            ];
        }

        self::where('group_id', $id)->delete();

        return $this::insert($Set);
    }
}
