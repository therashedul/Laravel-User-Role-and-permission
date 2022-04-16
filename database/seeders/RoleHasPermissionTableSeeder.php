<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->insert([
            'role_id' => '1',
            'permission_id' => '2',
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => '1',
            'permission_id' => '3',
        ]);
        DB::table('role_has_permissions')->insert([
           'role_id' => '1',
           'permission_id' => '12',
        ]);
         DB::table('role_has_permissions')->insert([
            'role_id' => '1',
            'permission_id' => '5',
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => '1',
            'permission_id' => '6',
        ]);
        DB::table('role_has_permissions')->insert([
           'role_id' => '1',
           'permission_id' => '7',
        ]);
    }
}
