<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VicePrincipalMessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vice_principal_messages')->delete();
        
        \DB::table('vice_principal_messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Professor Delowar Hossain',
                'name_bn' => 'অধ্যাপক দেলোয়ার হোসেন',
                'details' => 'বিস্তারিত',
                'details_bn' => NULL,
                'image' => '2071625904.jpg',
                'created_at' => NULL,
                'updated_at' => '2023-09-06 10:27:20',
            ),
        ));
        
        
    }
}