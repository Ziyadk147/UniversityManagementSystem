<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\table;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction( function(){
            $user = User::create([
                "name" => "admin",
                "email" => "admin@mail.com",
                "password" => Hash::make("123456789"),

            ])->id;

//        $user = User::find("admin");
            $role = Role::create([
                "name" => "admin",
            ])->id;

            Admin::create([
                "user_id" => $user,
            ]);

            DB::table('model_has_roles')->insert([
                'role_id' => $role,
                'model_type' => User::class,
                'model_id' => $user,
            ]);
        });

    }
}
