<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryFeatureValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_feature_values')->delete();
        
        \DB::table('category_feature_values')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_feature_id' => 4,
                'value' => '60 گرم',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:36:07',
                'updated_at' => '2025-12-03 09:36:07',
            ),
            1 => 
            array (
                'id' => 2,
                'category_feature_id' => 2,
                'value' => '250000',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:36:28',
                'updated_at' => '2025-12-03 09:36:28',
            ),
            2 => 
            array (
                'id' => 3,
                'category_feature_id' => 1,
                'value' => 'بسیار سخت',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:36:47',
                'updated_at' => '2025-12-03 09:36:47',
            ),
            3 => 
            array (
                'id' => 4,
                'category_feature_id' => 5,
                'value' => 'بافت',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:38:00',
                'updated_at' => '2025-12-03 09:38:00',
            ),
            4 => 
            array (
                'id' => 5,
                'category_feature_id' => 8,
                'value' => 'متوسط',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:38:10',
                'updated_at' => '2025-12-03 09:38:10',
            ),
            5 => 
            array (
                'id' => 6,
                'category_feature_id' => 9,
                'value' => 'سفید',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:38:21',
                'updated_at' => '2025-12-03 09:38:21',
            ),
            6 => 
            array (
                'id' => 7,
                'category_feature_id' => 3,
                'value' => 'بسیار زیاد',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:50:50',
                'updated_at' => '2025-12-03 10:50:50',
            ),
            7 => 
            array (
                'id' => 8,
                'category_feature_id' => 10,
                'value' => '60 گرم',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:51:06',
                'updated_at' => '2025-12-03 10:51:06',
            ),
            8 => 
            array (
                'id' => 9,
                'category_feature_id' => 10,
                'value' => '70 گرم',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:51:22',
                'updated_at' => '2025-12-03 10:51:22',
            ),
            9 => 
            array (
                'id' => 10,
                'category_feature_id' => 10,
                'value' => '30گرم',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:51:25',
                'updated_at' => '2025-12-03 10:51:25',
            ),
            10 => 
            array (
                'id' => 11,
                'category_feature_id' => 16,
                'value' => '10سال',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 12:06:25',
                'updated_at' => '2025-12-03 12:06:25',
            ),
            11 => 
            array (
                'id' => 12,
                'category_feature_id' => 16,
                'value' => '5سال',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 12:06:31',
                'updated_at' => '2025-12-03 12:06:31',
            ),
            12 => 
            array (
                'id' => 13,
                'category_feature_id' => 16,
                'value' => '20سال',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 12:06:38',
                'updated_at' => '2025-12-03 12:06:38',
            ),
            13 => 
            array (
                'id' => 14,
                'category_feature_id' => 16,
                'value' => '4 سال',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 12:06:44',
                'updated_at' => '2025-12-03 12:06:44',
            ),
            14 => 
            array (
                'id' => 15,
                'category_feature_id' => 16,
                'value' => '7 سال',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 12:06:52',
                'updated_at' => '2025-12-03 12:06:52',
            ),
            15 => 
            array (
                'id' => 16,
                'category_feature_id' => 16,
                'value' => '1سال',
                'deleted_at' => '2025-12-03 12:07:02',
                'created_at' => '2025-12-03 12:06:59',
                'updated_at' => '2025-12-03 12:07:02',
            ),
        ));
        
        
    }
}