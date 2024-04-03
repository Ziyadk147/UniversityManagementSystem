<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService{

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->getAllRoles();
    }

    public function storeRole($request)
    {
        $payload['name'] = $request->name;
        $this->roleRepository->storeRole($payload);
    }

    public function getRoleById($id)
    {
        return $this->roleRepository->getRoleById($id);
    }

    public function updateRole($data,$id)
    {
        $payload['name'] = $data->name;
        return $this->roleRepository->updateRole($payload ,$id);
    }

    public function destroyRole($id)
    {
        return $this->roleRepository->destroyRole($id);
    }
}
