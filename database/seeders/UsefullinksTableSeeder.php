<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsefullinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usefullinks')->delete();
        
        \DB::table('usefullinks')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 2,
                'linkurl' => 'http://www.ntrca.gov.bd',
                'title' => 'NTRCA',
            'title_bn' => 'বেসরকারি শিক্ষক নিবন্ধন ও প্রত্যয়ন কর্তৃপক্ষ (এনটিআরসিএ)',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'id' => 3,
                'linkurl' => 'http://www.dshe.gov.bd',
                'title' => 'Higher Secondary Office',
                'title_bn' => 'মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'id' => 4,
                'linkurl' => 'http://www.moedu.gov.bd',
                'title' => 'Education Ministry',
                'title_bn' => 'শিক্ষা মন্ত্রণালয়',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'id' => 5,
                'linkurl' => 'http://comillaboard.portal.gov.bd/',
                'title' => 'Cumilla Board',
                'title_bn' => 'কুমিল্লা বোর্ড',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'id' => 6,
                'linkurl' => 'http://www.bteb.gov.bd/',
                'title' => 'Technical Education Board',
                'title_bn' => 'কারিগরি শিক্ষা বোর্ড',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'id' => 7,
                'linkurl' => 'http://deo.dhaka.gov.bd/',
                'title' => 'District Education Office',
                'title_bn' => 'জেলা শিক্ষা অফিস',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'id' => 8,
                'linkurl' => 'http://www.nu.ac.bd/',
                'title' => 'National University',
                'title_bn' => 'জাতীয় বিশ্ববিদ্যালয়',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'id' => 9,
                'linkurl' => 'http://xiclassadmissiongovbd.com/',
                'title' => 'HSC Admission',
                'title_bn' => 'এইচ এস সি এডমিশন',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'id' => 10,
                'linkurl' => 'https://sbit.com.bd',
                'title' => 'Test',
                'title_bn' => 'টেস্ট',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}