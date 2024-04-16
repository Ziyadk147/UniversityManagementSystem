<?php

namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\Models\Images;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function updateUser($payload ,$role, $id)
    {
        DB::transaction(function() use($payload  , $role ,$id){
           $user = $this->getUserById($id);

           $user->update($payload);

           $user->syncRoles($role);
        });

    }

    public function updateUserProfile($payload , $image , $id)
    {
        DB::transaction(function() use($payload , $image , $id){
           $user = $this->getUserById($id);

           $user->update($payload);

           if ($image){

               if($user->image){
                   Images::where('user_id' ,$id)->delete();

               }

               $user->Image()->create([

                   'filename' => $image,

               ]);

           }

           return $user;

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
