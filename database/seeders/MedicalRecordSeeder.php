<?php

namespace Database\Seeders;

use App\Models\MedicalRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedicalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicalRecord::factory()->create([
            'registration_id' => 1,
            'action_id' => 3,
            'medicine_id' => 7,
            'diagnosa' => 'Demam Tinggi',
            'jumlah_obat' => 2,
            'slug' => Str::random(8),
            'catatan' => 'Pasien mengalami demam selama 3 hari berturut-turut.',
        ]);

        MedicalRecord::factory()->create([
            'registration_id' => 2,
            'action_id' => 4,
            'medicine_id' => 5,
            'diagnosa' => 'Batuk Kronis',
            'jumlah_obat' => 2,
            'slug' => Str::random(8),
            'catatan' => 'Batuk lebih dari 2 minggu, disarankan pemeriksaan lanjut.',
        ]);

        MedicalRecord::factory()->create([
            'registration_id' => 3,
            'action_id' => 2,
            'medicine_id' => 9,
            'diagnosa' => 'Hipertensi',
            'jumlah_obat' => 2,
            'slug' => Str::random(8),
            'catatan' => 'Tekanan darah tinggi, diberikan obat penurun tekanan darah.',
        ]);

        MedicalRecord::factory()->create([
            'registration_id' => 4,
            'action_id' => 1,
            'medicine_id' => 4,
            'diagnosa' => 'Infeksi Saluran Pernapasan Atas',
            'jumlah_obat' => 2,
            'slug' => Str::random(8),
            'catatan' => 'Diberikan antibiotik dan obat penurun panas.',
        ]);
    }
}
