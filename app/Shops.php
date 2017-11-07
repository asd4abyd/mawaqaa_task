<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shops
 * @package App
 *
 * @mixin \Eloquent
 */
class Shops extends Model
{
    public $fillable= ['name', 'logo_path', 'image_path', 'phone_1', 'phone_2', 'pref_description', 'description', 'delivery_time', 'delivery_charge'];
}
