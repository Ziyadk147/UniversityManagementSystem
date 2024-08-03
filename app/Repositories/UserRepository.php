<?php

namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\Models\Admin;
use App\Models\Classes;
use App\Models\Images;
use App\Models\Student;
use App\Models\User;
use App\Services\ClassService;
use App\Services\StudentService;
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
            $class = Classes::where("id" , $data['class'])->get()[0] ?? null;
            if($role->name == "student"){
                if($class['student_quantity'] < $class['capacity']){
                    $createdUser->assignRole($role);
                    $student = Student::create([
                        'user_id' => $createdUser->id,
                        "class_id" => $data['class']
                    ]);
                    $class->update([
                        'student_quantity' => $student->Class->student_quantity + 1
                    ]);
                }
            }
            elseif ($role->name == "admin"){
                $admin = Admin::create([
                    "user_id" => $createdUser->id
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
           $admin = Admin::where("user_id" , $user->id)->first();
//TODO://Refactor later
           if($role->name == "admin"){

               if($student != null){
                   $student->Class()->update([
                       'student_quantity' => $student->Class->student_quantity - 1
                   ]);
                   $student->delete();
                }
                if($admin != null){
                   $admin->update([
                       "user_id" => $user->id
                   ]);
                }
                else{
                    Admin::create([
                        'user_id' => $user->id
                    ]);
                }

           }
           else{
                if($student != null){
                    $student->update([
                        'user_id' => $user->id ,
                         'class_id' => $payload['class'],
                    ]);

                }
                else{
                    if($role->name == "student"){
                        $class  = Classes::where('id' , $payload['class'])->get();
                        if($class->student_quantity < $class->quantity){
                            $student = Student::create([
                                'user_id' => $user->id,
                                "class_id" => $payload['class']
                            ]);
                            $class->update([
                                'student_quantity' => $student->Class->student_quantity + 1
                            ]);
                        }
                    }
                }
                if($admin != null){
                    $admin->delete();
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
            $admin = Admin::where("user_id" , $user->id)->first()  ;

            if($student != null){
                $student->Class()->update([
                    'student_quantity' => $student->Class->student_quantity - 1
                ]);
                $student->delete();
            }
            if($image != null){
                $image->delete();
            }
            if($admin != null){
                $admin->delete();
            }

            $user->delete();

        });

    }
}
