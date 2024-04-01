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
        // TODO: Implement getAllRoles() method.
    }
}
