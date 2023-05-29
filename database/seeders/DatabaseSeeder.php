<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $superAdminPermission = Permission::create([
            'name' => 'super-admin',
        ]);

        $manageFormsPermission = Permission::create([
            'name' => 'manage forms',
        ]);

        $manageQueuePermission = Permission::create([
            'name' => 'manage queue',
        ]);

        $managePatientsPermission = Permission::create([
            'name' => 'manage patients',
        ]);

        $accessDoctorHubPermission = Permission::create([
            'name' => 'access doctor-hub',
        ]);

        $doctorRole = Role::create([
            'name' => 'doctor',
        ]);

        $secretaryRole = Role::create([
            'name' => 'secretary',
        ]);

        $doctorRole->givePermissionTo([$manageQueuePermission, $managePatientsPermission, $accessDoctorHubPermission, $manageFormsPermission]);
        $secretaryRole->givePermissionTo([$manageQueuePermission, $managePatientsPermission]);


        $yad = \App\Models\User::factory()->create([
            'name' => 'Yad Hoshyar',
            'email' => 'yad@healthline.com',
        ]);

        $rekar = \App\Models\User::factory()->create([
            'name' => 'Rekar Ibrahim',
            'email' => 'rekar@healthline.com',
        ]);

        $ragr = \App\Models\User::factory()->create([
            'name' => 'Ragr Ibrahim',
            'email' => 'ragr@healthline.com',
        ]);

        $noor = \App\Models\User::factory()->create([
            'name' => 'Noor Brusk',
            'email' => 'noor@healthline.com',
        ]);

        $imad = \App\Models\User::factory()->create([
            'name' => 'Imad Barzinji',
            'email' => 'imad@healthline.com',
        ]);

        $this->call([
            EntitySeeder::class,
            ClinicSeeder::class,
            GovernorateSeeder::class,
            PatientSeeder::class,
        ]);

        $clinicArray = Clinic::all()->pluck('id');

        $yad->clinics()->attach($clinicArray);
        $rekar->clinics()->attach($clinicArray);
        $ragr->clinics()->attach($clinicArray);
        $noor->clinics()->attach($clinicArray);
        $imad->clinics()->attach($clinicArray);

        $yad->assignRole($doctorRole);
        $yad->givePermissionTo($superAdminPermission);
        $rekar->assignRole($doctorRole);

        $ragr->assignRole($secretaryRole);
        $noor->assignRole($secretaryRole);
        $imad->assignRole($secretaryRole);

    }
}
