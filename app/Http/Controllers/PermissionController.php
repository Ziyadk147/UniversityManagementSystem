<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionStoreValidationRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private $permissionService;
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
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
}
