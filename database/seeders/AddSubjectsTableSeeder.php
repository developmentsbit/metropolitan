<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddSubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('add_subjects')->delete();
        
        \DB::table('add_subjects')->insert(array (
            0 => 
            array (
                'class_id' => 2,
                'created_at' => '2023-11-27 11:25:12',
                'group_id' => 6,
                'id' => 7,
                'status' => 1,
                'subject_code' => '222',
                'subject_name_bn' => NULL,
                'subject_name_en' => 'Bangla',
                'subject_serial_no' => 1,
                'subject_type' => '1',
                'updated_at' => '2023-11-27 11:25:12',
            ),
            1 => 
            array (
                'class_id' => 2,
                'created_at' => '2023-11-27 11:25:45',
                'group_id' => 6,
                'id' => 8,
                'status' => 1,
                'subject_code' => '222',
                'subject_name_bn' => NULL,
                'subject_name_en' => 'Bangla',
                'subject_serial_no' => 1,
                'subject_type' => '1',
                'updated_at' => '2023-11-27 11:25:45',
            ),
            2 => 
            array (
                'class_id' => 2,
                'created_at' => '2023-11-27 11:28:54',
                'group_id' => 7,
                'id' => 9,
                'status' => 1,
                'subject_code' => NULL,
                'subject_name_bn' => NULL,
                'subject_name_en' => 'English',
                'subject_serial_no' => NULL,
                'subject_type' => '1',
                'updated_at' => '2023-11-27 11:28:54',
            ),
        ));
        
        
    }
}