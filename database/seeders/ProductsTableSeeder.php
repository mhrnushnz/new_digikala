<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ایفون 16 پرومکس',
                'price' => 145000000,
                'discount' => 50,
                'short_description' => '<p>لسسثیشسصثی</p>
',
                'long_description' => 'این یکی از جدید ترین محصول وب سایت ما است و برای دیدن اطلاعات و جزئیات بیشتر لطفا بخش بررسی تخصصی را مطالعه نمایید',
                'stock' => 95700,
                'featured' => 1,
                'discount_duration' => '2025-09-25 00:00:00',
                'seller_id' => 4,
                'category_id' => 1,
                'p_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-12-03 10:19:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ایفون 13 پرو مکس',
                'price' => 0,
                'discount' => 10,
                'short_description' => NULL,
                'long_description' => NULL,
                'stock' => 766554,
                'featured' => 1,
                'discount_duration' => '2025-11-11 00:00:00',
                'seller_id' => 3,
                'category_id' => 4,
                'p_code' => 'Laravel-7234796',
                'deleted_at' => NULL,
                'created_at' => '2025-11-26 09:29:05',
                'updated_at' => '2025-11-26 09:29:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ایفون 16 نرمال',
                'price' => 105000000000,
                'discount' => 58,
                'short_description' => NULL,
                'long_description' => NULL,
                'stock' => 5415,
                'featured' => 1,
                'discount_duration' => '2025-11-01 00:00:00',
                'seller_id' => 4,
                'category_id' => 4,
                'p_code' => 'Laravel-3670232',
                'deleted_at' => NULL,
                'created_at' => '2025-11-26 09:29:33',
                'updated_at' => '2025-11-26 09:29:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ایفون 14',
                'price' => 890000000,
                'discount' => 10,
                'short_description' => NULL,
                'long_description' => NULL,
                'stock' => 5415,
                'featured' => 1,
                'discount_duration' => '2025-12-24 00:00:00',
                'seller_id' => 4,
                'category_id' => 3,
                'p_code' => 'Laravel-5677301',
                'deleted_at' => NULL,
                'created_at' => '2025-12-01 12:10:38',
                'updated_at' => '2025-12-01 12:10:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'ایفون 17نرمال',
                'price' => 890000000,
                'discount' => 10,
                'short_description' => 'توضیحات کوتاه',
                'long_description' => 'این قسمت هم مربوط به توضیحات بلند میشه ',
                'stock' => 5415,
                'featured' => 1,
                'discount_duration' => '2025-12-27 00:00:00',
                'seller_id' => 2,
                'category_id' => 3,
                'p_code' => 'Laravel-5475550',
                'deleted_at' => NULL,
                'created_at' => '2025-12-01 12:33:58',
                'updated_at' => '2025-12-01 12:33:58',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'دستگاه الکترونیکی',
                'price' => 650000000,
                'discount' => 10,
                'short_description' => NULL,
                'long_description' => NULL,
                'stock' => 766554,
                'featured' => 1,
                'discount_duration' => '2025-12-11 00:00:00',
                'seller_id' => 4,
                'category_id' => 2,
                'p_code' => 'Laravel-9550099',
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:25:02',
                'updated_at' => '2025-12-03 10:25:02',
            ),
        ));
        
        
    }
}