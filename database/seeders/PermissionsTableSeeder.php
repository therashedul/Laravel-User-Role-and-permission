<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use DB;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'menu-users',
            'menu-roles',
            'menu-permissions',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',            
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }

    }
}
