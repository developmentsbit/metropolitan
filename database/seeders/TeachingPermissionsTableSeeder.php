<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeachingPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teaching_permissions')->delete();
        
        \DB::table('teaching_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'subject' => 'পাঠদানের অনুমতি',
                'part' => 'নিম্ন মাধ্যমিক',
                'memorial_no' => '১০২০৩০৪০',
                'date' => '2023-09-01',
                'image' => '511710050.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-09-10 11:35:58',
                'updated_at' => '2023-09-10 12:10:24',
            ),
        ));
        
        
    }
}