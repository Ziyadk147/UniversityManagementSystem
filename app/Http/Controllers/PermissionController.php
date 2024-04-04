<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionStoreValidationRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    protected $permissionService , $roleService;
    public function __construct(PermissionService $permissionService , RoleService $roleService)
    {
        $this->permissionService = $permissionService;
        $this->roleService= $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->getAllData();
        return view('permission.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionStoreValidationRequest $request)
    {
        $this->permissionService->storePermission($request);
        return to_route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permissionService->getPermissionById($id);

        return view('permission.edit' , compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionStoreValidationRequest $request, string $id)
    {
        $permission = $this->permissionService->updatePermission($request , $id);
        return to_route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permissionService->destroyPermission($id);
        return to_route('permission.index');
    }

    public function showBindPermissionToRole()
    {
        $permissions = $this->permissionService->getAllData();
        $roles = $this->roleService->getAllRoles();

        $payload['permissions'] = $permissions;
        $payload['roles'] = $roles;

        return view('permission.bind-permission' , $payload);
    }

    public function getPermissionBindedToRole(Request $request)
    {
        $id = $request->id;
        $rolePermissions = $this->roleService->getRolePermissions($id);
//        dd($rolePermissions);
        return response(['status' => 200,'data' => $rolePermissions] , 200);
    }

    public function bindPermissionToRole(Request $request)
    {

        $role = $this->roleService->getRoleById($request->role);
        $permission = $request->selected_permission;
        $this->permissionService->bindPermissionToRole($role , $permission);
        return to_route('permission.bind');
    }
}
