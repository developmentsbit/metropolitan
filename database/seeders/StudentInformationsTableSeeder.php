<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentInformationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_informations')->delete();
        
        
        
    }
}