<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notices')->delete();
        
        \DB::table('notices')->insert(array (
            0 => 
            array (
                'id' => 9,
                'type' => '1',
                'date' => '2023-07-02',
                'title' => 'আমার চোখে বঙ্গবন্ধু বিষয়ে এক মিনিটব্যাপী ভিডিও চিত্র তৈরি সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'আমার চোখে বঙ্গবন্ধু বিষয়ে এক মিনিটব্যাপী ভিডিও চিত্র তৈরি সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/91552.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 18,
                'type' => '1',
                'date' => '2023-07-31',
            'title' => 'স্নাতক (পাস) ১ম বর্ষ নির্বাচনী পরীক্ষার্থীদের সতর্কীকরণ বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/32115.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 21,
                'type' => '1',
                'date' => '2023-08-02',
                'title' => 'বীর মুক্তিযোদ্ধা শহীদ ক্যাপ্টেন শেখ কামাল এঁর ৭৪ তম জন্মবার্ষিকী উপলক্ষ্যে রচনা প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/20428.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 26,
                'type' => '1',
                'date' => '2023-08-09',
                'title' => '২০২৩-২০২৪ শিক্ষাবর্ষে একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => '২০২৩-২০২৪ শিক্ষাবর্ষে একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/63353.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 27,
                'type' => '1',
                'date' => '2023-08-13',
                'title' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর সময়সূচি পরিবর্তন সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর সময়সূচি পরিবর্তন সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/57393.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}