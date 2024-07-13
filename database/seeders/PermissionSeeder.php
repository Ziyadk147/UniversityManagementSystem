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
