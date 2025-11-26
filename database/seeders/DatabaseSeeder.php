<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SellersTableSeeder::class,
            CountrySeeder::class,
            StateSeeder::class ,
            CategoriesTableSeeder::class,
            SeoItemsTableSeeder::class,
            ProductsTableSeeder::class,
            ProductImagesTableSeeder::class
        ]);
    }
}
