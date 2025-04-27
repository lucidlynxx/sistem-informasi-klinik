<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => $this->faker->numberBetween(1, 20),
            'jenis_kunjungan' => $this->faker->randomElement([
                'Pemeriksaan Umum',
                'Konsultasi Dokter',
                'Kontrol Rutin',
            ]),
            'slug' => Str::random(8),
            'tanggal_daftar' => $this->faker->dateTimeBetween('-7 days', 'now'), // ini acak 7 hari terakhir
            'status' => $this->faker->randomElement(['selesai', 'menunggu']),
        ];
    }
}
