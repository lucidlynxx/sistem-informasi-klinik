<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MedicalRecord;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            EmployeeSeeder::class,
            ActionSeeder::class,
            MedicineSeeder::class,
            PatientSeeder::class,
            RegistrationSeeder::class,
            MedicalRecordSeeder::class
        ]);

        Registration::factory(100)->create();
        MedicalRecord::factory(100)->create();
    }
}
