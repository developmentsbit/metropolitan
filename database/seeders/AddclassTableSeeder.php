<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddclassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('addclass')->delete();
        
        \DB::table('addclass')->insert(array (
            0 => 
            array (
                'id' => 2,
                'class_name' => 'Eleven',
                'class_name_bn' => 'একাদশ',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'class_name' => 'Twelve',
                'class_name_bn' => 'দ্বাদশ',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'class_name' => 'Honours',
                'class_name_bn' => 'অনার্স',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'class_name' => 'Master\'s',
                'class_name_bn' => 'মাষ্টার্স',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'class_name' => 'BBA',
                'class_name_bn' => 'বিবিএ',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'class_name' => 'Six',
                'class_name_bn' => 'ষষ্ঠ শ্রেণী',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}