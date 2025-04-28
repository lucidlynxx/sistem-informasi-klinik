<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_id' => $this->faker->numberBetween(1, 100),
            'action_id' => $this->faker->numberBetween(1, 20),
            'medicine_id' => $this->faker->numberBetween(1, 20),
            'jumlah_obat' => $this->faker->numberBetween(1, 3),
            'diagnosa' => $this->faker->randomElement([
                'Demam Tinggi',
                'Batuk Pilek',
                'Patah Tulang',
                'Infeksi Saluran Pernafasan',
                'Hipertensi',
                'Diabetes Melitus',
                'Asma',
                'Migrain',
                'Alergi',
                'Diare Akut',
            ]),
            'slug' => Str::random(8),
            'catatan' => $this->faker->randomElement([
                'Pasien mengalami demam selama 3 hari berturut-turut.',
                'Keluhan batuk kering tanpa dahak sejak 5 hari lalu.',
                'Nyeri perut bagian bawah, tidak disertai mual.',
                'Keluhan pusing berputar disertai mual muntah.',
                'Pasien mengalami sesak napas saat aktivitas berat.',
                'Keluhan sakit kepala ringan sejak pagi hari.',
                'Luka terbuka di lutut akibat jatuh dari motor.',
                'Pasien mengeluh nyeri dada saat berolahraga.',
                'Timbul ruam merah di kulit setelah mengonsumsi seafood.',
                'Pasien tidak mengalami alergi obat yang diketahui.',
            ]),
        ];
    }
}
