<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sellers')->delete();
        
        \DB::table('sellers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '',
                'shop_name' => 'شاپپ1',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '',
                'shop_name' => 'شاپ2',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '',
                'shop_name' => 'شاپ3',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '',
                'shop_name' => 'شاپ4',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '',
                'shop_name' => 'شاپ5',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}