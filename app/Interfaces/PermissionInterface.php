<?php

namespace App\Interfaces;


use Illuminate\Http\Request;

interface PermissionInterface{
    public function getAllPermissions();

    public function storePermission($data);

    public function destroyPermission($id);

    public function getPermissionById($id);

    public function updatePermission($data , $id);

    public function bindPermissionToRole($role , $permissions);
}

