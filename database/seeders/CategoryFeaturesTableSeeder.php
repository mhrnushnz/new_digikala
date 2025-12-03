<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_features')->delete();
        
        \DB::table('category_features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ضد ضربه',
                'category_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:33:34',
                'updated_at' => '2025-12-03 09:33:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'قیمت مناسب',
                'category_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:33:49',
                'updated_at' => '2025-12-03 09:33:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'بالا ترین کیفیت',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:34:04',
                'updated_at' => '2025-12-03 09:34:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'وزن',
                'category_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:35:57',
                'updated_at' => '2025-12-03 09:35:57',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'نوع پارچه',
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:37:07',
                'updated_at' => '2025-12-03 09:37:07',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'سایز',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:37:17',
                'updated_at' => '2025-12-03 09:37:17',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'رنگ',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:37:22',
                'updated_at' => '2025-12-03 09:37:22',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'ضخامت',
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:37:40',
                'updated_at' => '2025-12-03 09:37:40',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'رنگ',
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 09:37:49',
                'updated_at' => '2025-12-03 09:37:49',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'وزن',
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:49:37',
                'updated_at' => '2025-12-03 10:49:37',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'جنس',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:49:48',
                'updated_at' => '2025-12-03 10:49:48',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'سن',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:49:55',
                'updated_at' => '2025-12-03 10:49:55',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'کیفیت',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:50:00',
                'updated_at' => '2025-12-03 10:50:00',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'مقاومت',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:50:07',
                'updated_at' => '2025-12-03 10:50:07',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'قیمت',
                'category_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:50:15',
                'updated_at' => '2025-12-03 10:50:15',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'سن',
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:51:35',
                'updated_at' => '2025-12-03 10:51:35',
            ),
        ));
        
        
    }
}