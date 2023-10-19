<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddsectionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('addsection')->delete();
        
        \DB::table('addsection')->insert(array (
            0 => 
            array (
                'id' => 3,
                'class_id' => 2,
                'group_id' => NULL,
                'section_name' => 'A',
                'section_name_bn' => NULL,
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'class_id' => 2,
                'group_id' => NULL,
                'section_name' => 'B',
                'section_name_bn' => NULL,
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'class_id' => 3,
                'group_id' => NULL,
                'section_name' => 'A',
                'section_name_bn' => NULL,
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 8,
                'class_id' => 2,
                'group_id' => 6,
                'section_name' => 'A',
                'section_name_bn' => 'এ',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}