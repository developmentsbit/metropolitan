<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('group_infos')->delete();
        
        \DB::table('group_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class_id' => 1,
                'group_name' => 'Business Studies',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'class_id' => 1,
                'group_name' => 'Humanities',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'class_id' => 1,
                'group_name' => 'Science',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'class_id' => 2,
                'group_name' => 'Business Studies',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'class_id' => 2,
                'group_name' => 'Humanities ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'class_id' => 2,
                'group_name' => 'Science',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'class_id' => 3,
                'group_name' => 'Part-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'class_id' => 3,
                'group_name' => 'Part-2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'class_id' => 3,
                'group_name' => 'Part-3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'class_id' => 3,
                'group_name' => 'Part-4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'class_id' => 4,
                'group_name' => 'Part-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'class_id' => 4,
                'group_name' => 'Part-2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'class_id' => 4,
                'group_name' => 'Part-3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'class_id' => 5,
                'group_name' => 'Final',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'class_id' => 5,
                'group_name' => 'Part-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}