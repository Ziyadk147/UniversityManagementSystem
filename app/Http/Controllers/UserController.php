<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreValidationRequest;
use App\Http\Requests\User\UserUpdateValidationRequest;
use App\Repositories\UserRepository;
use App\Services\ClassService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService , $roleService , $classService;

    public function __construct(UserService $userService , RoleService $roleService , ClassService $classService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->classService = $classService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $payload['users'] = $this->userService->getAllUsers();
        foreach ($payload['users'] as $key => $user){
            $payload['userRoles'][$key] = $this->userService->getUserRoles($user);
        }
        return view('user.index' , $payload);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payload['roles'] = $this->roleService->getAllRoles();
        $payload['classes'] = $this->classService->getAllClasses();
        return view('user.create' , $payload);
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
        $payload['roles'] = $this->roleService->getAllRoles();
        $payload['user'] = $this->userService->getUserById($id);
        $payload['userRole'] = $this->userService->getUserRoles($payload['user']);
        return view('user.tempedit' , $payload);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $payload['user'] = $this->userService->getUserById($id);
        $payload['userRole'] = $this->userService->getUserRoles($payload['user']);
        $payload['roles'] = $this->roleService->getAllRoles();
        $payload['classes'] = $this->classService->getAllClasses();
        $payload['userClass'] = $payload['user']->Student->Class ?? null;

        return view('user.edit' , $payload);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = $this->userService->updateUser($request , $id);

        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateProfile(Request $request )
    {
        $id = $request->id;
        $user = $this->userService->profileUpdate($request , $id);
        return to_route('home');

    }
    public function destroy(string $id)
    {
        $this->userService->destroyUser($id);
        return  to_route('user.index');
    }
}
