<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('class_infos')->delete();
        
        \DB::table('class_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class_name' => 'Eleven',
                'index' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'class_name' => 'Twelve',
                'index' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'class_name' => 'Honours',
                'index' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'class_name' => 'Degree',
                'index' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'class_name' => 'Mastes',
                'index' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}