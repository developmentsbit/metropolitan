<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuActionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_actions')->delete();
        
        \DB::table('menu_actions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Create',
                'bn_name' => 'সংযোজন',
                'system_name' => NULL,
                'icon' => 'fa fa-plus-circle',
                'slug' => 'create',
                'button_class' => 'btn btn-primary btn-sm',
                'order_by' => 1,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-02-25 09:45:31',
                'updated_at' => '2021-02-25 09:49:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Edit',
                'bn_name' => 'পরিমার্জন',
                'system_name' => NULL,
                'icon' => 'fa fa-edit',
                'slug' => 'edit',
                'button_class' => 'btn btn-warning btn-sm edit',
                'order_by' => 2,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-02-25 09:47:13',
                'updated_at' => '2021-04-04 05:15:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Delete',
                'bn_name' => 'মুছুন',
                'system_name' => NULL,
                'icon' => 'fa fa-trash-alt',
                'slug' => 'delete',
                'button_class' => 'btn btn-danger btn-sm destroy',
                'order_by' => 4,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-02-25 09:48:38',
                'updated_at' => '2021-02-28 12:33:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'View',
                'bn_name' => 'দেখুন',
                'system_name' => NULL,
                'icon' => 'fa fa-eye',
                'slug' => 'view',
                'button_class' => 'btn btn-info btn-sm',
                'order_by' => 3,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-02-27 08:58:40',
                'updated_at' => '2021-02-27 10:16:44',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Permission',
                'bn_name' => 'অনুমতি',
                'system_name' => NULL,
                'icon' => 'fa fa-lock',
                'slug' => 'permission',
                'button_class' => 'btn btn-primary btn-sm',
                'order_by' => 5,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-03-18 10:38:54',
                'updated_at' => '2021-03-18 10:38:54',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Order',
                'bn_name' => 'ভিন্ন',
                'system_name' => NULL,
                'icon' => 'fa fa-gavel',
                'slug' => 'order',
                'button_class' => 'btn btn-warning btn-sm order',
                'order_by' => 6,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-03-24 11:28:00',
                'updated_at' => '2021-03-24 11:28:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Check',
                'bn_name' => 'চিহ্ন',
                'system_name' => NULL,
                'icon' => 'fa fa-check',
                'slug' => 'check',
                'button_class' => 'btn btn-primary btn-sm',
                'order_by' => 7,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-04-05 10:07:08',
                'updated_at' => '2021-04-05 10:16:41',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Print',
                'bn_name' => 'মুদ্রণ',
                'system_name' => NULL,
                'icon' => 'fas fa-print',
                'slug' => 'print',
                'button_class' => 'btn btn-primary btn-sm',
                'order_by' => 8,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-05-08 06:03:01',
                'updated_at' => '2021-05-08 06:03:10',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Restore',
                'bn_name' => 'পুনরুদ্ধার',
                'system_name' => NULL,
                'icon' => 'fa fa-undo',
                'slug' => 'restore',
                'button_class' => 'btn btn-warning btn-sm restore',
                'order_by' => 9,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2021-07-12 11:14:14',
                'updated_at' => '2021-07-12 11:37:10',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Edit-History',
                'bn_name' => 'পরিমার্জনের ইতিহাস',
                'system_name' => NULL,
                'icon' => 'fas fa-history',
                'slug' => 'edit_history',
                'button_class' => 'btn btn-info btn-sm edit_history',
                'order_by' => 10,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2021-10-31 05:52:20',
                'updated_at' => '2021-11-01 09:37:48',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}