<?php

namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements  UserInterface{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUser()
    {
        return $this->user->with('roles')->get();
    }

    public function storeUser($data , $role)
    {
        DB::transaction(function() use($data , $role){

            $createdUser = $this->user->create($data);
            $createdUser->assignRole($role);
            return $createdUser;
            });
    }

    public function updateUser($payload, $role, $id)
    {
        DB::transaction(function() use($payload , $role ,$id){
           $user = $this->getUserById($id);
           $user->update($payload);

           $user->syncRoles($role);
        });
    }

    public function getUserById($id)
    {
        return $this->user->find($id);
    }
    public function getUserRoles($user)
    {
        return $user->getRoleNames();
    }

    public function destroyUser($id)
    {
        $user = $this->getUserById($id);
        $user->delete();
    }
}
