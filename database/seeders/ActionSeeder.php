<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Umum',
            'slug' => Str::random(10),
            'biaya' => 50000,
            'keterangan' => 'Pemeriksaan kondisi umum pasien oleh dokter umum.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Suntik Vitamin C',
            'slug' => Str::random(10),
            'biaya' => 75000,
            'keterangan' => 'Penyuntikan vitamin C untuk meningkatkan daya tahan tubuh.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Nebulizer',
            'slug' => Str::random(10),
            'biaya' => 60000,
            'keterangan' => 'Terapi uap untuk pasien dengan gangguan pernapasan.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemasangan Infus',
            'slug' => Str::random(10),
            'biaya' => 85000,
            'keterangan' => 'Tindakan medis untuk memasang cairan infus.',
        ]);

        Action::factory()->create([
            'tindakan' => 'EKG (Elektrokardiogram)',
            'slug' => Str::random(10),
            'biaya' => 120000,
            'keterangan' => 'Pemeriksaan jantung menggunakan alat EKG.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pembersihan Luka',
            'slug' => Str::random(10),
            'biaya' => 45000,
            'keterangan' => 'Tindakan membersihkan luka ringan sampai sedang.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Laboratorium Darah',
            'slug' => Str::random(10),
            'biaya' => 150000,
            'keterangan' => 'Tes darah lengkap untuk mengecek kesehatan pasien.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Gula Darah',
            'slug' => Str::random(10),
            'biaya' => 30000,
            'keterangan' => 'Cek kadar gula darah menggunakan alat glucometer.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Konsultasi Dokter Spesialis',
            'slug' => Str::random(10),
            'biaya' => 200000,
            'keterangan' => 'Konsultasi lanjutan dengan dokter spesialis.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemasangan Kateter',
            'slug' => Str::random(10),
            'biaya' => 95000,
            'keterangan' => 'Tindakan pemasangan alat bantu buang air kecil.',
        ]);
    }
}
