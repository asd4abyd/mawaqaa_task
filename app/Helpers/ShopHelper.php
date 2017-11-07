<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 07/11/17
 * Time: 14:11
 */


use App\Repository\ShopInterface;

if (! function_exists('shop')) {

    function shop()
    {
            return app(ShopInterface::class);
    }
}