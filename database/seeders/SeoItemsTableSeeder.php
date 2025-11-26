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
                'created_at' => '2025-09-17 12:07:29',
                'updated_at' => '2025-09-17 12:07:29',
            ),
        ));
        
        
    }
}