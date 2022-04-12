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
            'slug' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Executive',
            'slug' => 'Executive',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Developer',
            'slug' => 'Developer',
        ]);
    }
}