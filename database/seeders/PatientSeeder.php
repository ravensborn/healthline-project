<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Patient::factory(200)->create();

        \App\Models\Patient::factory()->create([
            'code' => 'ABZ987',
            'name' => 'Noor Brusk',
            'email' => 'noor.brwsk@gmail.com',
            'primary_phone_number' => '+9647504918230',
            'secondary_phone_number' => '+9647504918230',
        ]);

        \App\Models\Patient::factory()->create([
            'code' => 'ABK356',
            'name' => 'Rekar Ibrahim',
            'email' => 'rekar.abraham@gmail.com',
            'primary_phone_number' => '+9647509370123',
            'secondary_phone_number' => '+9647509370123',
        ]);

//        \App\Models\Patient::factory()->create([
//            'code' => 'ABK3456',
//            'name' => 'Ragr Ibrahim',
//            'email' => 'ragr@live.com',
//            'primary_phone_number' => '+9647501234567',
//            'secondary_phone_number' => '+9647501234567',
//        ]);



    }
}
