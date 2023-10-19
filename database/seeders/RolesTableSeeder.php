<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'status' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 15:34:59',
                'updated_at' => '2023-03-23 08:58:55',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'guard_name' => 'web',
                'status' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 15:34:59',
                'updated_at' => '2023-03-23 08:58:55',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-30 17:49:59',
                'updated_at' => '2023-03-30 17:49:59',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'TTT',
                'guard_name' => 'web',
                'status' => 1,
                'deleted_by' => 1,
                'created_at' => '2023-09-21 11:24:21',
                'updated_at' => '2023-09-21 11:25:03',
                'deleted_at' => '2023-09-21 11:25:03',
            ),
        ));
        
        
    }
}