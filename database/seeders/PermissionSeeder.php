<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $permissions = [
            "view-live-announcements",
            "view-historical-announcements",
            "sidebar-view-dashboard",
            "sidebar-view-users",
            "sidebar-view-courses",
            "sidebar-view-materials",
            "sidebar-view-permissions",
            "sidebar-view-roles",
            "sidebar-view-classes",
            "create-course",
            "edit-course",
            "delete-course",
            "create-material",
            "edit-material",
            "delete-material",
            "create-user",
            "edit-user",
            "delete-user",
            "create-permission",
            "edit-permission",
            "delete-permission",
            "bind-permission",
            "create-role",
            "edit-role",
            "delete-role",
            "create-announcement",
        ];


        foreach ($permissions as $permission) {
            Permission::create(
                [
                    'name' => $permission
                ]
            );
        }
    }
}
