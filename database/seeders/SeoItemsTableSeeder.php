<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeoItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seo_items')->delete();
        
        \DB::table('seo_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'ایفون-16-پرومکس',
                'meta_title' => 'مدل جدید ایفون',
                'meta_description' => 'این جدید ترین مدل ایفون میباشد',
                'type' => 'product',
                'ref_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-09-17 12:07:29',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'ایفون-13-پرو-مکس',
                'meta_title' => 'مدل جدید ایفون',
                'meta_description' => 'این جدید ترین مدل هدفون میباشد',
                'type' => 'product',
                'ref_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2025-11-26 09:29:05',
                'updated_at' => '2025-11-26 09:29:05',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'ایفون12-پرومکس',
                'meta_title' => 'مدل جدید هدفون',
                'meta_description' => 'این جدید ترین مدل هدفون میباشد',
                'type' => 'product',
                'ref_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-11-26 09:29:33',
                'updated_at' => '2025-11-26 09:29:33',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'ایفون-13-پرومکس',
                'meta_title' => 'مدل جدید هدفون',
                'meta_description' => 'این جدید ترین مدل ایفون میباشد',
                'type' => 'product',
                'ref_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2025-12-01 12:10:38',
                'updated_at' => '2025-12-01 12:10:38',
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'ایفون-14پرومکس',
                'meta_title' => 'مدل جدید هدفون',
                'meta_description' => 'این جدید ترین مدل هدفون میباشد',
                'type' => 'product',
                'ref_id' => 5,
                'deleted_at' => NULL,
                'created_at' => '2025-12-01 12:33:58',
                'updated_at' => '2025-12-01 12:33:58',
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'دستگاه-الکترونیکی',
                'meta_title' => 'مدل جدید دستگاه الکترونیکی',
                'meta_description' => 'مدل جدید دستگاه الکترونیکی',
                'type' => 'product',
                'ref_id' => 7,
                'deleted_at' => NULL,
                'created_at' => '2025-12-03 10:25:02',
                'updated_at' => '2025-12-03 10:25:02',
            ),
        ));
        
        
    }
}