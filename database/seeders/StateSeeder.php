<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = ["یزد","همدان","هرمزگان", "فارس", "البرز", "سیستان بلوچستان", "سمنان", "اصفهان", "خوزستان"];
        foreach ($states as $state) {
            State::query()->create([
                'name' => $state,
                'country_id' => Country::all()->random()->id
            ]);
        }
    }
}
