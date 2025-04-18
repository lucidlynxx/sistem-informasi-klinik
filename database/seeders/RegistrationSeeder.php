<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::factory()->create([
            'patient_id' => 1,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'menunggu'
        ]);

        Registration::factory()->create([
            'patient_id' => 2,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'selesai'
        ]);

        Registration::factory()->create([
            'patient_id' => 3,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'menunggu'
        ]);

        Registration::factory()->create([
            'patient_id' => 4,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'selesai'
        ]);

        Registration::factory()->create([
            'patient_id' => 5,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'menunggu'
        ]);

        Registration::factory()->create([
            'patient_id' => 6,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'selesai'
        ]);

        Registration::factory()->create([
            'patient_id' => 7,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'menunggu'
        ]);

        Registration::factory()->create([
            'patient_id' => 8,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'selesai'
        ]);

        Registration::factory()->create([
            'patient_id' => 9,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'menunggu'
        ]);

        Registration::factory()->create([
            'patient_id' => 10,
            'jenis_kunjungan' => 'Pemeriksaan Umum',
            'slug' => Str::random(8),
            'tanggal_daftar' => now(),
            'status' => 'selesai'
        ]);
    }
}
