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
                'short_description' => NULL,
                'long_description' => NULL,
                'stock' => 95700,
                'featured' => 1,
                'discount_duration' => '2025-09-25 00:00:00',
                'seller_id' => 4,
                'category_id' => 1,
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-09-17 12:07:29',
            ),
        ));
        
        
    }
}