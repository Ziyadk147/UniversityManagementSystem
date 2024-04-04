<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleStoreValidationRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('role.index' , compact('roles') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreValidationRequest $request)
    {
        $role = $this->roleService->storeRole($request);
        return to_route('role.index');
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
        $role = $this->roleService->getRoleById($id);
        return view('role.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleStoreValidationRequest $request, string $id)
    {
        $this->roleService->updateRole($request , $id);
        return to_route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleService->destroyRole($id);
        return to_route('role.index');
    }
}
