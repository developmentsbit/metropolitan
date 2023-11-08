<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('setting')->delete();
        
        \DB::table('setting')->insert(array (
            0 => 
            array (
                'address' => 'Main Campus- Basundhara River View, Hasnabad, South Keraniganj, Dhaka
Campus-2: Metropolitan School & College, 329/8, South Jatrabari, Dhaka.',
                'address_bangla' => 'প্রধান ক্যাম্পাস- বসুন্ধরা রিভার ভিউ, হাসনাবাদ, দক্ষিণ কেরানীগঞ্জ, ঢাকা
ক্যাম্পাস-২: মেট্রোপলিটন স্কুল অ্যান্ড কলেজ, ৩২৯/৮, দক্ষিণ যাত্রাবাড়ী, ঢাকা।',
                'created_at' => NULL,
                'description' => 'a',
                'eiin' => '134265',
                'eiin_bangla' => '১৩৪২৬৫',
                'email' => 'metropolitanbd@gmail.com',
                'established' => '2008',
                'established_bangla' => '২০০৮',
                'id' => 3,
                'image' => 'setting_image/5876.jpg',
                'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14612.358496302824!2d90.4351764!3d23.7084933!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9c94335c5f7%3A0xa58f05d666deb0ac!2sMetropolitan%20School%20%26%20College!5e0!3m2!1sen!2sbd!4v1695805329743!5m2!1sen!2sbd',
                'meta' => 'a',
                'meta_title' => 'a',
                'name' => 'Metropolitan School and College',
                'name_bangla' => 'মেট্রোপলিটন স্কুল এন্ড কলেজ',
                'page' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMetropolitanCollegeDhaka&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId',
                'phone' => '01720-557140',
                'type' => 'college',
                'updated_at' => NULL,
                'youtube' => 'https://www.youtube.com/embed/bZ8NQa5ewLs?si=_DAy8syHJpTz9bDv',
            ),
        ));
        
        
    }
}