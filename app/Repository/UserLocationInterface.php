<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 05/11/17
 * Time: 20:16
 */

namespace App\Repository;


interface UserLocationInterface
{

    public function getAll($userId);

    public function getOne($userId, $id);

    public function create($userId, array $fields);

    public function update($id, array $fields);

    public function delete($id);

}