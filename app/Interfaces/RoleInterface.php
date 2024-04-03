<?php

namespace App\Interfaces;

interface RoleInterface{
    public function getAllRoles();

    public function StoreRole($data);

    public function getRoleById($id);

    public function updateRole($data ,$id);
    public function destroyRole($id);

}
