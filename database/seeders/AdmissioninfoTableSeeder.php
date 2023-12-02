<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdmissioninfoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admissioninfo')->delete();
        
        \DB::table('admissioninfo')->insert(array (
            0 => 
            array (
                'id' => 3,
                'date' => '2023-09-01',
                'type' => '1',
                'title' => 'Prospects',
                'title_bn' => 'প্রসপেক্টস',
                'image' => 'admissioninfo_image/36290.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'date' => '2023-09-01',
                'type' => '2',
                'title' => 'Admission Process',
                'title_bn' => 'ভর্তি প্রক্রিয়া',
                'image' => 'admissioninfo_image/81001.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'date' => '2023-09-01',
                'type' => '3',
                'title' => 'Admission Rules',
                'title_bn' => 'ভর্তি নিয়মাবলী',
                'image' => 'admissioninfo_image/91922.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'date' => '2023-09-01',
                'type' => '4',
                'title' => 'Admission Result',
                'title_bn' => 'ভর্তি রেজাল্ট',
                'image' => 'admissioninfo_image/66072.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'date' => '2023-09-01',
                'type' => '5',
                'title' => 'Admission Question',
                'title_bn' => 'ভর্তি প্রশ্ন',
                'image' => 'admissioninfo_image/34381.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}