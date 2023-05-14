<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Governorate;
use App\Models\SubDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $names = ['Yad', 'Rekar', 'Ragr', 'Noor', 'Imad', 'Ahmad', 'Muhammad', 'Azad', 'Ary', 'Aland'];

        return [
            'code' => Str::random(9),
            'name' => $this->faker->randomElement($names) . ' ' . $this->faker->lastName,
            'email' => $this->faker->email,
            'primary_phone_number' => '+964750' . $this->faker->randomNumber(7),
            'secondary_phone_number' => '+964750' . $this->faker->randomNumber(7),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'birthdate' => $this->faker->date,
            'ethnicity' => $this->faker->randomElement(['kurd','iraqi','syrian']),
            'occupation' => $this->faker->word,
            'governorate_id' => $this->faker->randomElement(Governorate::all()),
            'district_id' => $this->faker->randomElement(District::all()),
            'sub_district_id' => $this->faker->randomElement(SubDistrict::all()),
        ];
    }
}
