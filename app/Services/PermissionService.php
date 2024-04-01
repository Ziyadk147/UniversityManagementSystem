<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    private $permissionRepositories;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepositories = $permissionRepository;
    }

    public function getAllData()
    {
        return $this->permissionRepositories->getAllData();
    }
}
