<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideogallerysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videogallerys')->delete();
        
        \DB::table('videogallerys')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'linkurl' => 'https://www.youtube-nocookie.com/embed/ZZpp4WMokZ0',
                'title' => 'test',
                'title_bn' => 'test',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'id' => 2,
                'linkurl' => 'https://sbit.com.bd',
                'title' => 'TEST',
                'title_bn' => 'TTTTTT',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}