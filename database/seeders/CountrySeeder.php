<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ["ایران","عراق","ترکیه", "انگلستان", "لندن"];

        foreach ($countries as $country) {
            Country::query()->create(['name' => $country]);
        }
    }
}
