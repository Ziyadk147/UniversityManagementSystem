<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BindPermissionAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = Permission::all()->pluck('id')->toArray();

        $role = Role::findByName("admin")->id;

        foreach ($permissions as $permission) {

            DB::table("role_has_permissions")->insert([

                "permission_id" => $permission,
                "role_id" => $role,

            ]);

        }
    }
}
