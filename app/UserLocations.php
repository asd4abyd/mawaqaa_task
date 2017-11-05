<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLocations
 * @package App
 *
 * @mixin \Eloquent
 */
class UserLocations extends Model
{
    protected $fillable = [
        'user_id', 'paci', 'area', 'location', 'map', 'is_active'
    ];

}
