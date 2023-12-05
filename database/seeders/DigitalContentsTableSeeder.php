<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DigitalContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('digital_contents')->delete();
        
        \DB::table('digital_contents')->insert(array (
            0 => 
            array (
                'id' => 4,
                'date' => '2023-12-01',
                'class_id' => 7,
                'group_id' => 6,
                'subject_id' => 13,
                'title' => 'Chapter-02> Lesson-02',
                'title_bn' => 'অধ্যায়-02> পাঠ-02',
                'teacher_name' => 'Mobinul Islam Tazim',
                'teacher_name_bn' => 'মুবিনুল ইসলাম তাজিম',
                'details' => '<p>No details given.<br></p>',
                'details_bn' => '<p><span style="font-size: 14.4px;">কোন বিবরণ দেওয়া হয়নি।</span><br></p>',
                'status' => 1,
                'file' => '618454844.pptx',
                'created_at' => '2023-11-29 10:43:46',
                'updated_at' => '2023-11-29 10:50:22',
            ),
            1 => 
            array (
                'id' => 5,
                'date' => '2023-11-30',
                'class_id' => 7,
                'group_id' => NULL,
                'subject_id' => 14,
                'title' => 'Test',
                'title_bn' => 'Test',
                'teacher_name' => 'Taxim',
                'teacher_name_bn' => 'তাজিম',
                'details' => '<p>Details</p>',
                'details_bn' => '<p>বিস্তারিত<br></p>',
                'status' => 1,
                'file' => '1045734926.pptx',
                'created_at' => '2023-11-30 13:51:02',
                'updated_at' => '2023-11-30 13:51:02',
            ),
            2 => 
            array (
                'id' => 6,
                'date' => '2023-12-02',
                'class_id' => 2,
                'group_id' => 6,
                'subject_id' => 7,
                'title' => 'dsfds',
                'title_bn' => 'fsdafs',
                'teacher_name' => 'dfasdf',
                'teacher_name_bn' => 'sdfdsaf',
                'details' => '<p>dsafs</p>',
                'details_bn' => '<p>fdsaf</p>',
                'status' => 1,
                'file' => '1469096246.pptx',
                'created_at' => '2023-12-02 09:49:04',
                'updated_at' => '2023-12-02 09:49:04',
            ),
            3 => 
            array (
                'id' => 7,
                'date' => '2023-12-02',
                'class_id' => 7,
                'group_id' => NULL,
                'subject_id' => 13,
                'title' => 'test',
                'title_bn' => 'test',
                'teacher_name' => 'Mobinul Islam',
                'teacher_name_bn' => 'মুবিনুল ইসলাম',
                'details' => NULL,
                'details_bn' => NULL,
                'status' => 1,
                'file' => '1034273165.jpg',
                'created_at' => '2023-12-02 16:45:49',
                'updated_at' => '2023-12-02 16:45:49',
            ),
        ));
        
        
    }
}