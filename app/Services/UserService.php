<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository , $roleRepository;


    public function __construct(UserRepository $userRepository , RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUser();
    }

    public function storeUser($request)
    {
        $payload['name'] = $request->name;
        $payload['email'] = $request->email;
        $payload['password'] = Hash::make($request->password);
        $role = $this->roleRepository->getRoleById($request->role);

        return $this->userRepository->storeUser($payload, $role);
    }

    public function profileUpdate($request , $id)
    {
        $payload['name'] = $request->name;
        $payload['email'] = $request->email;
        $image = null;

        if($request->has('image')){
            $file = $request->file('image');
            $filename = $this->storeImage($file);
            $image = $filename;
        }
        return $this->userRepository->updateUserProfile($payload , $image , $id );
    }
    public function updateUser($request  , $id)
    {
        $payload['name'] = $request->name;
        $payload['email'] = $request->email;
        $role = $this->roleRepository->getRoleById($request->role);
        return $this->userRepository->updateUser($payload , $role , $id);
    }

    public function storeImage($image)
    {

//        $extension = $image->getClientOriginalName();
//        $filename = time() . '.' . $extension;
//        ;

        $image = $image->store('images/userImages/'.Auth::id().'/' , 'public');
        $imagePath = basename($image);
        return $imagePath;
    }
    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }
    public function getUserRoles($user)
    {
        return $this->userRepository->getUserRoles($user);
    }

    public function destroyUser($id)
    {
        return $this->userRepository->destroyUser($id);
    }
}
