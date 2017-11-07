<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 05/11/17
 * Time: 20:16
 */

namespace App\Repository;


interface ShopInterface
{

    public function getAll($userId = null, $active=1);

    public function getOne($id);

    public function getOneByUserId($userId=null);

    public function create(array $fields);

    public function update($id, array $fields);

    public function delete($id);

}