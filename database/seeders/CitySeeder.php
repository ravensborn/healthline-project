<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = ['Erbil', 'Slemani', 'Duhok', 'Halabja', 'Kirkuk'];

        foreach ($cities as $city) {
            City::factory()->create([
                'name' => $city
            ]);
        }


    }
}
