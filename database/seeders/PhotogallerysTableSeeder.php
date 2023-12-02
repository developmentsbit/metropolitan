<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotogallerysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('photogallerys')->delete();

        \DB::table('photogallerys')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'id' => 8,
                'image' => 'photogallerys_image/22730.jpg',
                'slider' => 1,
                'title' => '2',
                'title_bn' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'created_at' => NULL,
                'id' => 9,
                'image' => 'photogallerys_image/49218.jpg',
                'slider' => 1,
                'title' => '3',
                'title_bn' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'created_at' => NULL,
                'id' => 10,
                'image' => 'photogallerys_image/38324.jpg',
                'slider' => 1,
                'title' => '3',
                'title_bn' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
