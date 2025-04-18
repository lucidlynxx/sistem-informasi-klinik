<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::factory()->create([
            'name' => 'Ahmad Saputra',
            'slug' => Str::random(8),
            'nik' => '3201010101010001',
            'tanggal_lahir' => '1990-05-20',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Merdeka No. 1',
            'region_id' => 1,
            'no_hp' => '081234567890'
        ]);

        Patient::factory()->create([
            'name' => 'Siti Aminah',
            'slug' => Str::random(8),
            'nik' => '3201010101010002',
            'tanggal_lahir' => '1988-03-15',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Kenanga No. 2',
            'region_id' => 2,
            'no_hp' => '081298765432'
        ]);

        Patient::factory()->create([
            'name' => 'Budi Santoso',
            'slug' => Str::random(8),
            'nik' => '3201010101010003',
            'tanggal_lahir' => '1975-12-05',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Melati No. 3',
            'region_id' => 3,
            'no_hp' => '081345678901'
        ]);

        Patient::factory()->create([
            'name' => 'Dewi Lestari',
            'slug' => Str::random(8),
            'nik' => '3201010101010004',
            'tanggal_lahir' => '1995-07-22',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Anggrek No. 4',
            'region_id' => 4,
            'no_hp' => '082123456789'
        ]);

        Patient::factory()->create([
            'name' => 'Rudi Hartono',
            'slug' => Str::random(8),
            'nik' => '3201010101010005',
            'tanggal_lahir' => '1982-11-11',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Mawar No. 5',
            'region_id' => 5,
            'no_hp' => '082198765432'
        ]);

        Patient::factory()->create([
            'name' => 'Indah Permatasari',
            'slug' => Str::random(8),
            'nik' => '3201010101010006',
            'tanggal_lahir' => '1993-02-28',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Flamboyan No. 6',
            'region_id' => 6,
            'no_hp' => '081356789012'
        ]);

        Patient::factory()->create([
            'name' => 'Teguh Prasetyo',
            'slug' => Str::random(8),
            'nik' => '3201010101010007',
            'tanggal_lahir' => '1979-09-10',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Dahlia No. 7',
            'region_id' => 7,
            'no_hp' => '082234567890'
        ]);

        Patient::factory()->create([
            'name' => 'Rina Marlina',
            'slug' => Str::random(8),
            'nik' => '3201010101010008',
            'tanggal_lahir' => '1991-01-18',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Teratai No. 8',
            'region_id' => 8,
            'no_hp' => '081223344556'
        ]);

        Patient::factory()->create([
            'name' => 'Doni Saputro',
            'slug' => Str::random(8),
            'nik' => '3201010101010009',
            'tanggal_lahir' => '1986-08-30',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Kamboja No. 9',
            'region_id' => 9,
            'no_hp' => '081345612345'
        ]);

        Patient::factory()->create([
            'name' => 'Fitriani Azizah',
            'slug' => Str::random(8),
            'nik' => '3201010101010010',
            'tanggal_lahir' => '1998-06-12',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Cempaka No. 10',
            'region_id' => 10,
            'no_hp' => '082212345678'
        ]);
    }
}
