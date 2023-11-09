<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoCurriculamActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('co_curriculam_activities')->delete();

        \DB::table('co_curriculam_activities')->insert(array (
            0 =>
            array (
                'id' => 2,
                'title' => 'Cambrian Sports Academy',
                'title_bn' => 'ক্যাম্ব্রিয়ান স্পোর্টস একাডেমী',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '816848418.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => NULL,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:08:02',
                'updated_at' => '2023-11-09 06:08:02',
            ),
            1 =>
            array (
                'id' => 3,
                'title' => 'Cambrian Cultural Academy',
                'title_bn' => 'ক্যাম্ব্রিয়ান সাংস্কৃতিক একাডেমি',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '1896818983.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:12:07',
                'updated_at' => '2023-11-09 06:45:39',
            ),
            2 =>
            array (
                'id' => 4,
                'title' => 'Cambrian Scout Group',
                'title_bn' => 'ক্যাম্ব্রিয়ান স্কাউট গ্রুপ',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '2047904538.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:12:33',
                'updated_at' => '2023-11-09 06:46:02',
            ),
            3 =>
            array (
                'id' => 5,
                'title' => 'Cambrian Institute Of Modern Language',
                'title_bn' => 'ক্যাম্ব্রিয়ান মডার্ণ ল্যাঙ্গুয়েজ ইনষ্টিটিউট',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '2001029237.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:13:14',
                'updated_at' => '2023-11-09 06:46:47',
            ),
            4 =>
            array (
                'id' => 6,
                'title' => 'Cambrian Handwriting',
                'title_bn' => 'ক্যাম্ব্রিয়ান হাতেখড়ি',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '1515907621.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:13:29',
                'updated_at' => '2023-11-09 06:47:16',
            ),
            5 =>
            array (
                'id' => 7,
                'title' => 'Takewondo',
                'title_bn' => 'Takewondo',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '1634548528.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:14:05',
                'updated_at' => '2023-11-09 06:47:34',
            ),
            6 =>
            array (
                'id' => 8,
                'title' => 'Leo',
                'title_bn' => 'লিও',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '809441499.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:14:24',
                'updated_at' => '2023-11-09 06:47:47',
            ),
            7 =>
            array (
                'id' => 9,
                'title' => 'BNCC',
                'title_bn' => 'বি এস সি সি',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '1300996214.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:14:38',
                'updated_at' => '2023-11-09 06:48:12',
            ),
            8 =>
            array (
                'id' => 10,
                'title' => 'Cambrian Science Club',
                'title_bn' => 'ক্যাম্ব্রিয়ান সায়েন্স ক্লাব',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '120813172.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:15:00',
                'updated_at' => '2023-11-09 06:48:39',
            ),
            9 =>
            array (
                'id' => 11,
                'title' => 'Learn Holy Quran',
                'title_bn' => 'কুুরআন শিক্ষা',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '471448784.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:15:23',
                'updated_at' => '2023-11-09 06:49:01',
            ),
            10 =>
            array (
                'id' => 12,
                'title' => 'Rugby Club',
                'title_bn' => 'রুগবি ক্লাব',
                'description' => NULL,
                'description_bn' => NULL,
                'image' => '1734518244.png',
                'deleted_at' => NULL,
                'create_by' => 1,
                'edit_by' => 1,
                'delete_by' => NULL,
                'restore_by' => NULL,
                'created_at' => '2023-11-09 06:15:43',
                'updated_at' => '2023-11-09 06:49:20',
            ),
        ));


    }
}
