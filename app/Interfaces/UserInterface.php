<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function getAllUser();

    public function storeUser($data , $role);

    public function getUserById($id);
    public function getUserRoles( $user);

    public function updateUser($payload ,$role , $id);

    public function destroyUser($id);

}
