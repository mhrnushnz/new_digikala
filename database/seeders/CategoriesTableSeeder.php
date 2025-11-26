<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'موبایل',
                'category_id' => NULL,
                'created_at' => '2025-09-17 10:43:39',
                'updated_at' => '2025-09-17 10:43:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'لباس',
                'category_id' => NULL,
                'created_at' => '2025-09-17 10:43:45',
                'updated_at' => '2025-09-17 10:43:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'گل و گیاه ',
                'category_id' => NULL,
                'created_at' => '2025-09-17 10:44:02',
                'updated_at' => '2025-09-17 10:44:02',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'لوازم جانبی',
                'category_id' => NULL,
                'created_at' => '2025-09-17 10:44:30',
                'updated_at' => '2025-09-17 10:44:30',
            ),
        ));
        
        
    }
}