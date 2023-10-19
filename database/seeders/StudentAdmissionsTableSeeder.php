<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentAdmissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_admissions')->delete();
        
        \DB::table('student_admissions')->insert(array (
            0 => 
            array (
                'id' => 7,
                'apply_date' => '2023-07-09',
                'student_name' => 'Mobinul Islam',
                'father_name' => 'dsfsad',
                'mother_name' => 'fsdfsdf',
                'religion' => 'Islam',
                'blood_group' => 'A+',
                'date_of_birth' => '2023-07-09',
                'gender' => 'Male',
                'image' => '623823583.jpg',
                'class_id' => NULL,
                'group_id' => NULL,
                'year' => NULL,
                'present_house_name' => NULL,
                'present_village' => NULL,
                'present_po' => NULL,
                'present_post_code' => NULL,
                'present_upazila' => NULL,
                'present_district' => NULL,
                'permenant_house_name' => NULL,
                'permenant_village' => NULL,
                'permenant_po' => NULL,
                'permenant_post_code' => NULL,
                'permenant_upazila' => NULL,
                'permenant_district' => NULL,
                'guardian_name' => NULL,
                'relation' => NULL,
                'guardian_contact' => NULL,
                'guardian_email' => NULL,
                'status' => 1,
                'created_at' => '2023-07-09 05:57:53',
                'updated_at' => '2023-07-09 05:57:53',
            ),
            1 => 
            array (
                'id' => 11,
                'apply_date' => '2023-07-27',
                'student_name' => 'Mobinul Islam',
                'father_name' => 'Mozammel Haque',
                'mother_name' => 'Fatema Begum',
                'religion' => 'Islam',
                'blood_group' => 'A+',
                'date_of_birth' => '2023-07-18',
                'gender' => 'Male',
                'image' => '2060802058.jpg',
                'class_id' => NULL,
                'group_id' => NULL,
                'year' => NULL,
                'present_house_name' => NULL,
                'present_village' => NULL,
                'present_po' => NULL,
                'present_post_code' => NULL,
                'present_upazila' => NULL,
                'present_district' => NULL,
                'permenant_house_name' => NULL,
                'permenant_village' => NULL,
                'permenant_po' => NULL,
                'permenant_post_code' => NULL,
                'permenant_upazila' => NULL,
                'permenant_district' => NULL,
                'guardian_name' => NULL,
                'relation' => NULL,
                'guardian_contact' => NULL,
                'guardian_email' => NULL,
                'status' => 1,
                'created_at' => '2023-07-27 08:32:17',
                'updated_at' => '2023-07-27 08:32:17',
            ),
        ));
        
        
    }
}