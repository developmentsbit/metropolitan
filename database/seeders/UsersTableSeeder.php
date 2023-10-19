<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // enable foreign key constraints
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'mobile' => NULL,
                'dob' => NULL,
                'picture' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$tsTwmoEc9KOp4ie.ZZIXaeU2e/hIZW5kBb/xFhUr0I6suCc5tsefy',
                'deleted_by' => NULL,
                'status' => 1,
                'deleted_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-03-18 19:07:28',
                'updated_at' => '2023-10-02 10:05:49',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'mobile' => NULL,
                'dob' => NULL,
                'picture' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$avqu.cFfoARivdEGFj8etusRTELEB8C7It8G9hyoYf8pfJ8Wc7FC2',
                'deleted_by' => NULL,
                'status' => 1,
                'deleted_at' => '2023-10-02 10:07:16',
                'remember_token' => NULL,
                'created_at' => '2023-03-18 19:07:28',
                'updated_at' => '2023-10-02 10:07:16',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'mobile' => '+8800000000',
                'dob' => NULL,
                'picture' => '1150004412.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ABjRPwk3o556BY2LHNUaMu2HR//UWOSIHlCAAWjncBoNOTUZER/yK',
                'deleted_by' => NULL,
                'status' => 1,
                'deleted_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-10-02 10:08:19',
                'updated_at' => '2023-10-04 09:02:10',
            ),
        ));


    }
}
