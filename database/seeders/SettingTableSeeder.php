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
                'address' => 'College Road, Feni',
                'address_bangla' => 'কলেজ রোড, ফেনী।',
                'created_at' => NULL,
                'description' => 'a',
                'email' => 'info@sbit.com.bd',
                'established' => '1922',
                'established_bangla' => '১৯২২',
                'id' => 3,
                'image' => 'setting_image/1634.jpg',
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.3151496011915!2d91.39952317446281!3d23.01219811671689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375368337aa0494d%3A0x7bf9b62c0dcc6e3a!2sFeni%20Government%20College!5e0!3m2!1sen!2sbd!4v1689404154362!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
                'meta' => 'a',
                'meta_title' => 'a',
                'name' => 'Feni Govt. College',
                'name_bangla' => 'ফেনী সরকারি কলেজ',
                'page' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffenigovernmentcollege&tabs=timeline&width=340&height=331&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=4970441506393676',
                'phone' => '+8801811358602',
                'type' => 'college',
                'updated_at' => NULL,
                'youtube' => 'https://www.youtube.com/embed/gxDjLQj4xkg',
            ),
        ));
        
        
    }
}