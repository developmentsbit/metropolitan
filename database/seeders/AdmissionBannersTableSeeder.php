<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdmissionBannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admission_banners')->delete();
        
        \DB::table('admission_banners')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'image' => '572902079.png',
                'title' => '#',
                'title_bn' => '#',
                'updated_at' => '2023-11-26 17:49:15',
            ),
        ));
        
        
    }
}