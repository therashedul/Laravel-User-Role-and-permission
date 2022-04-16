<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Executive',
            'slug' => 'executive',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Developer',
            'slug' => 'developer',
        ]);

    }
}
