<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreValidationRequest;
use App\Http\Requests\User\UserUpdateValidationRequest;
use App\Repositories\UserRepository;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService , $roleService;

    public function __construct(UserService $userService , RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payload['users'] = $this->userService->getAllUsers();

        return view('user.index' , $payload);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getAllRoles();
        return view('user.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreValidationRequest $request)
    {

        $user = $this->userService->storeUser($request);
        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.tempedit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $payload['user'] = $this->userService->getUserById($id);
        $payload['userRole'] = $this->userService->getUserRoles($payload['user']);
        $payload['roles'] = $this->roleService->getAllRoles();
        return view('user.edit' , $payload);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateValidationRequest $request, string $id)
    {
        $user = $this->userService->updateUser($request , $id);
        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->destroyUser($id);
        return  to_route('user.index');
    }
}
