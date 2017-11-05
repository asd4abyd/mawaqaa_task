<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 05/11/17
 * Time: 20:29
 */

namespace App\Repository\Eloquent;


use App\Repository\UserLocationInterface;
use App\UserLocations;

class UserLocation implements UserLocationInterface
{

    private $location;

    public function __construct(UserLocations $location) {
        $this->location = $location;
    }

    public function getAll($userId)
    {
        return $this->location->where('user_id', $userId)->get();
    }

    public function getOne($userId, $id)
    {
        return $this->location->where(['user_id' => $userId, 'id' => $id])->firstOrFail();
    }

    public function create($userId, array $fields)
    {
        $fields['user_id'] = $userId;
        return $this->location->create($fields);
    }

    public function update($id, array $fields)
    {
        $location = $this->location::where('user_id', $fields['user_id'])->findOrFail($id);

        $location->update($fields);

        return $location;
    }

    public function delete($id)
    {
        $this->location::findOrFail($id)->delete();
    }
}