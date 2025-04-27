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
            'name' => 'Fajar Maulana',
            'slug' => Str::random(8),
            'nik' => '3201010101010011',
            'tanggal_lahir' => '1992-04-10',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Semangka No. 11',
            'region_id' => 1,
            'no_hp' => '081234567891'
        ]);

        Patient::factory()->create([
            'name' => 'Nadia Rahmawati',
            'slug' => Str::random(8),
            'nik' => '3201010101010012',
            'tanggal_lahir' => '1990-10-05',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Durian No. 12',
            'region_id' => 2,
            'no_hp' => '082134567891'
        ]);

        Patient::factory()->create([
            'name' => 'Arief Kurniawan',
            'slug' => Str::random(8),
            'nik' => '3201010101010013',
            'tanggal_lahir' => '1987-01-25',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Rambutan No. 13',
            'region_id' => 3,
            'no_hp' => '081298123456'
        ]);

        Patient::factory()->create([
            'name' => 'Lestari Widya',
            'slug' => Str::random(8),
            'nik' => '3201010101010014',
            'tanggal_lahir' => '1994-12-18',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Mangga No. 14',
            'region_id' => 4,
            'no_hp' => '082123487654'
        ]);

        Patient::factory()->create([
            'name' => 'Rangga Saputra',
            'slug' => Str::random(8),
            'nik' => '3201010101010015',
            'tanggal_lahir' => '1985-03-30',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Pisang No. 15',
            'region_id' => 5,
            'no_hp' => '081212345678'
        ]);

        Patient::factory()->create([
            'name' => 'Dina Amelia',
            'slug' => Str::random(8),
            'nik' => '3201010101010016',
            'tanggal_lahir' => '1997-09-07',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Sawo No. 16',
            'region_id' => 6,
            'no_hp' => '082154321987'
        ]);

        Patient::factory()->create([
            'name' => 'Gilang Ramadhan',
            'slug' => Str::random(8),
            'nik' => '3201010101010017',
            'tanggal_lahir' => '1991-06-15',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Alpukat No. 17',
            'region_id' => 7,
            'no_hp' => '081278945612'
        ]);

        Patient::factory()->create([
            'name' => 'Putri Ayu',
            'slug' => Str::random(8),
            'nik' => '3201010101010018',
            'tanggal_lahir' => '1989-02-27',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Anggur No. 18',
            'region_id' => 8,
            'no_hp' => '082167895432'
        ]);

        Patient::factory()->create([
            'name' => 'Dika Pratama',
            'slug' => Str::random(8),
            'nik' => '3201010101010019',
            'tanggal_lahir' => '1983-08-21',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Jambu No. 19',
            'region_id' => 9,
            'no_hp' => '081367895432'
        ]);

        Patient::factory()->create([
            'name' => 'Salsa Amelia',
            'slug' => Str::random(8),
            'nik' => '3201010101010020',
            'tanggal_lahir' => '1996-11-03',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Duku No. 20',
            'region_id' => 10,
            'no_hp' => '082256789012'
        ]);

        Patient::factory()->create([
            'name' => 'Rizky Aditya',
            'slug' => Str::random(8),
            'nik' => '3201010101010021',
            'tanggal_lahir' => '1990-07-17',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Nangka No. 21',
            'region_id' => 1,
            'no_hp' => '081245678912'
        ]);

        Patient::factory()->create([
            'name' => 'Yuni Safitri',
            'slug' => Str::random(8),
            'nik' => '3201010101010022',
            'tanggal_lahir' => '1993-05-11',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Kedondong No. 22',
            'region_id' => 2,
            'no_hp' => '082145678912'
        ]);

        Patient::factory()->create([
            'name' => 'Alvin Saputra',
            'slug' => Str::random(8),
            'nik' => '3201010101010023',
            'tanggal_lahir' => '1988-04-22',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Belimbing No. 23',
            'region_id' => 3,
            'no_hp' => '081378945612'
        ]);

        Patient::factory()->create([
            'name' => 'Ratna Sari',
            'slug' => Str::random(8),
            'nik' => '3201010101010024',
            'tanggal_lahir' => '1997-01-09',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Nanas No. 24',
            'region_id' => 4,
            'no_hp' => '082167894321'
        ]);

        Patient::factory()->create([
            'name' => 'Bayu Prakoso',
            'slug' => Str::random(8),
            'nik' => '3201010101010025',
            'tanggal_lahir' => '1986-06-06',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Pepaya No. 25',
            'region_id' => 5,
            'no_hp' => '081223456789'
        ]);

        Patient::factory()->create([
            'name' => 'Citra Puspita',
            'slug' => Str::random(8),
            'nik' => '3201010101010026',
            'tanggal_lahir' => '1995-10-20',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Srikaya No. 26',
            'region_id' => 6,
            'no_hp' => '082145678901'
        ]);

        Patient::factory()->create([
            'name' => 'Yoga Permana',
            'slug' => Str::random(8),
            'nik' => '3201010101010027',
            'tanggal_lahir' => '1984-03-03',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Kurma No. 27',
            'region_id' => 7,
            'no_hp' => '081245678912'
        ]);

        Patient::factory()->create([
            'name' => 'Mega Sari',
            'slug' => Str::random(8),
            'nik' => '3201010101010028',
            'tanggal_lahir' => '1992-09-25',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Lemon No. 28',
            'region_id' => 8,
            'no_hp' => '082156789123'
        ]);

        Patient::factory()->create([
            'name' => 'Rifki Hidayat',
            'slug' => Str::random(8),
            'nik' => '3201010101010029',
            'tanggal_lahir' => '1987-12-12',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Sirsak No. 29',
            'region_id' => 9,
            'no_hp' => '081367891234'
        ]);

        Patient::factory()->create([
            'name' => 'Wulan Sari',
            'slug' => Str::random(8),
            'nik' => '3201010101010030',
            'tanggal_lahir' => '1999-02-02',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Kelengkeng No. 30',
            'region_id' => 10,
            'no_hp' => '082245678901'
        ]);
    }
}
