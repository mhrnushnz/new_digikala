<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'یزد',
                'country_id' => 5,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'همدان',
                'country_id' => 2,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'هرمزگان',
                'country_id' => 5,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'فارس',
                'country_id' => 2,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'البرز',
                'country_id' => 5,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'سیستان بلوچستان',
                'country_id' => 3,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'سمنان',
                'country_id' => 5,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'اصفهان',
                'country_id' => 1,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'خوزستان',
                'country_id' => 4,
                'created_at' => '2025-11-26 09:22:18',
                'updated_at' => '2025-11-26 09:22:18',
            ),
        ));
        
        
    }
}