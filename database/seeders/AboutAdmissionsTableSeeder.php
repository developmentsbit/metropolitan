<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutAdmissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('about_admissions')->delete();
        
        \DB::table('about_admissions')->insert(array (
            0 => 
            array (
                'created_at' => '2023-11-26 09:54:36',
                'date' => '2023-11-26',
                'id' => 2,
                'image' => '742792969.png',
                'title' => NULL,
                'title_bn' => NULL,
                'updated_at' => '2023-11-26 09:54:36',
            ),
            1 => 
            array (
                'created_at' => '2023-11-26 10:33:43',
                'date' => '2023-11-26',
                'id' => 3,
                'image' => '1835248394.png',
                'title' => NULL,
                'title_bn' => NULL,
                'updated_at' => '2023-11-26 10:33:43',
            ),
        ));
        
        
    }
}