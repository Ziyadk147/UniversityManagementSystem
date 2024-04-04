<?php

namespace App\Repositories;
use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function getAllPermissions()
    {
        return $this->permission->all();
    }

    public function storePermission($data)
    {
       $this->permission->create($data);
    }
    public function getPermissionById($id)
    {
        return $this->permission->find($id);
    }

    public function updatePermission($data , $id)
    {
        $permission = $this->getPermissionById($id);
        return $permission->update($data);
    }
    public function bindPermissionToRole($role, $permissions)
    {
        return $role->syncPermissions($permissions);
    }

    public function destroyPermission($id)
    {
        return $this->getPermissionById($id)->delete();

    }
}
