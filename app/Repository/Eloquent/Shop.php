<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 05/11/17
 * Time: 20:29
 */

namespace App\Repository\Eloquent;


use App\Repository\ShopInterface;
use App\Shops;

class Shop implements ShopInterface
{
    private $shops;

    public function __construct(Shops $shops) {
        $this->shops = $shops;
    }

    public function getAll($userId = null, $active=1)
    {
        $wh = [];

        if(!is_null($active)) {
            $wh['is_active'] = $active;
        }

        if($userId) {
            $wh['user_id'] = $userId;
        }

        return $this->shops->where($wh)->get();
    }

    public function getOne($id)
    {
        return $this->shops->firstOrFail($id);
    }

    public function getOneByUserId($userId=null)
    {
        if(is_null($userId)){
            $userId = optional(auth()->user())->id;
        }
        return $this->shops->where('user_id', $userId)->first();
    }

    public function create(array $fields)
    {
        $fields['user_id'] = auth()->user()->id;
        return $this->shops->create($fields);
    }

    public function update($id, array $fields)
    {
        $shop = $this->shops::findOrFail($id);

        $fields['updated_at'] = time();
        $shop->update($fields);


        return $shop;
    }

    public function delete($id)
    {
        $this->shops::findOrFail($id)->update(['is_active', 0]);
    }
}