<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Governorate;
use App\Models\SubDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $governorateArray = ['Erbil'];

        foreach ($governorateArray as $item) {
            Governorate::factory()->create([
                'name' => $item
            ]);
        }

        $districtsArray = ['Center', 'Shaqlawa'];

        foreach ($districtsArray as $item) {
            District::factory()->create([
                'name' => $item
            ]);
        }

        $subDistrictsArray = ['Center', 'Harir', 'Pirmam'];

        foreach ($subDistrictsArray as $item) {
            SubDistrict::factory()->create([
                'name' => $item
            ]);
        }


    }
}
