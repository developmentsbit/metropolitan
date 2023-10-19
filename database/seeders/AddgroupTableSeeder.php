<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddgroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('addgroup')->delete();
        
        \DB::table('addgroup')->insert(array (
            0 => 
            array (
                'id' => 6,
                'class_id' => 2,
                'group_name' => 'Science',
                'group_name_bn' => 'বিজ্ঞান',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 7,
                'class_id' => 2,
                'group_name' => 'Business Studies',
                'group_name_bn' => 'ব্যবসায় শিক্ষা',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 8,
                'class_id' => 2,
                'group_name' => 'Humanities',
                'group_name_bn' => 'মানবিক',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 9,
                'class_id' => 3,
                'group_name' => 'Business Studies',
                'group_name_bn' => 'ব্যবসায় শিক্ষা',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 10,
                'class_id' => 3,
                'group_name' => 'Science',
                'group_name_bn' => 'বিজ্ঞান',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 11,
                'class_id' => 3,
                'group_name' => 'Humanities',
                'group_name_bn' => 'মানবিক',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}