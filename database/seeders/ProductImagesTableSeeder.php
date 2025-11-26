<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'path' => 'Screenshot 2025-09-09 150505.webp',
                'is_cover' => 1,
                'product_id' => 1,
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-09-17 12:07:29',
            ),
            1 => 
            array (
                'id' => 2,
                'path' => 'Screenshot 2025-09-13 141301.webp',
                'is_cover' => 0,
                'product_id' => 1,
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-09-17 12:07:29',
            ),
        ));
        
        
    }
}