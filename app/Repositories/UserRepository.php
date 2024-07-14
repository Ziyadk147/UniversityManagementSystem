<?php

namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\Models\Images;
use App\Models\Student;
use App\Models\User;
use app\services\StudentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class UserRepository implements  UserInterface{

    protected $user;

    public function __construct(User $user )
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

            if($role->name == "student"){

                Student::create([

                    'user_id' => $createdUser->id

                ]);

            }
            return $createdUser;
            });
    }

    public function updateUser($payload ,$role, $id)
    {
        DB::transaction(function() use($payload  , $role ,$id){
           $user = $this->getUserById($id);

           $user->update($payload);

           $user->syncRoles($role);

           $student = Student::where('user_id', $user->id)->first();

           if($role->name != "student"){

                if($student != null){

                    $student->delete();

                }
           }
           else{
                if($student != null){
                    $student->update([
                        'user_id' => $user->id
                    ]);
                }
                else{
                    Student::create([
                        "user_id" => $user->id
                    ]);
                }

           }

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
        DB::transaction(function() use($id){
            $user = $this->getUserById($id);

            $student = Student::where('user_id', $user->id)->first() ;
            $image = Images::where("user_id" , $user->id)->first()  ;

            if($student != null){
                $student->delete();
            }
            if($image != null){
                $image->delete();
            }

            $user->delete();

        });

    }
}
