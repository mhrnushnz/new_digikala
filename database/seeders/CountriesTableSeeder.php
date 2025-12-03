<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ایران',
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'عراق',
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ترکیه',
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'انگلستان',
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'لندن',
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
        ));
        
        
    }
}