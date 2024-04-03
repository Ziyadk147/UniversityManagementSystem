<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements  RoleInterface
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }

    public function StoreRole($data)
    {

        return $this->role->create($data);

    }
    public function getRoleById($id)
    {
        return $this->role->find($id);
    }

    public function updateRole($data, $id)
    {
        $role = $this->getRoleById($id);
        return $role->update($data);
    }

    public function destroyRole($id)
    {
        return $this->getRoleById($id)->delete();
    }

    public function getRolePermissions($id)
    {
        $role = $this->getRoleById($id);
        return $role->permissions;
    }
}
