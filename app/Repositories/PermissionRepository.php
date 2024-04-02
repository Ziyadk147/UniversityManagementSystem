<?php

namespace App\Repositories;
use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function getAllData()
    {
        return $this->permission->all();
    }

}
