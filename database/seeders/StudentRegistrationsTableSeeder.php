<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentRegistrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_registrations')->delete();
        
        
        
    }
}