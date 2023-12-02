<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentAttendanceInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_attendance_infos')->delete();
        
        \DB::table('student_attendance_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Student Attendance Information',
                'title_bn' => 'শিক্ষার্থীর উপস্থিতির তথ্য',
                'details' => 'বিস্তারিত তথ্য প্রদান করুন',
                'image' => '1167197453.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}