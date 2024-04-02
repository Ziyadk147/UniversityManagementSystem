<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService{

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
}
