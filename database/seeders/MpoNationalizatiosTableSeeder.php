<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MpoNationalizatiosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mpo_nationalizatios')->delete();
        
        \DB::table('mpo_nationalizatios')->insert(array (
            0 => 
            array (
                'id' => 4,
                'date' => '2023-09-11',
                'subject' => 'test',
                'subject_bn' => 'test',
                'layer' => 'test',
                'layer_bn' => 'test',
                'memorial_no' => 'test',
                'image' => '1544353542.jpg',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2023-09-11 07:25:48',
            ),
        ));
        
        
    }
}