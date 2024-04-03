<?php

namespace App\Services;

use App\Http\Requests\Permission\PermissionStoreValidationRequest;
use App\Repositories\PermissionRepository;

class PermissionService
{
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAllData()
    {
        return $this->permissionRepository->getAllPermissions();
    }

    public function storePermission($request)
    {
        $payload['name'] = $request->name;
        return $this->permissionRepository->storePermission($payload);
    }

    public function getPermissionById($id)
    {

        return $this->permissionRepository->getPermissionById($id);

    }

    public function destroyPermission($id)
    {
        return $this->permissionRepository->destroyPermission($id);
    }

    public function updatePermission($data , $id)
    {
        $payload['name'] = $data->name;
        return $this->permissionRepository->updatePermission($payload , $id);
    }
}
