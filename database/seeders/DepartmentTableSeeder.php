<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('department')->delete();
        
        \DB::table('department')->insert(array (
            0 => 
            array (
                'id' => 27,
                'department' => 'Accounting',
                'department_name_bn' => 'হিসাববিজ্ঞান',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 28,
                'department' => 'Bangla',
                'department_name_bn' => 'বাংলা',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 29,
                'department' => 'Chamestry',
                'department_name_bn' => 'রসায়ন',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 30,
                'department' => 'English',
                'department_name_bn' => 'ইংরেজী',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 31,
                'department' => 'History',
                'department_name_bn' => 'ইতিহাস',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 32,
                'department' => 'Islamic History & Culture',
                'department_name_bn' => 'ইসলামের ইতিহাস ও সংস্কৃতি',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 33,
                'department' => 'Management',
                'department_name_bn' => 'ব্যবস্হাপনা',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 34,
                'department' => 'Philosopy',
                'department_name_bn' => 'দর্শন',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 35,
                'department' => 'Physics',
                'department_name_bn' => 'পদার্থ বিজ্ঞান',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 36,
                'department' => 'Political Science',
                'department_name_bn' => 'রাষ্ট্র বিজ্ঞান',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 37,
                'department' => 'Social Work',
                'department_name_bn' => 'সমাজ কল্যাণ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 39,
                'department' => 'Economics',
                'department_name_bn' => 'অর্থনীতি',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 41,
                'department' => 'Mathmatics',
                'department_name_bn' => 'গণিত',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 42,
                'department' => 'Biology',
                'department_name_bn' => 'জীববিজ্ঞান',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 43,
                'department' => 'Botany',
                'department_name_bn' => 'উদ্ভিদ বিদ্যা',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 44,
                'department' => 'Zoology',
                'department_name_bn' => 'প্রাণি বিদ্যা',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 46,
                'department' => 'T',
                'department_name_bn' => 'tt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}