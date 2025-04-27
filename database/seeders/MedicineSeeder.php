<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::factory()->create([
            'nama_obat' => 'Aspirin',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2500,
            'stok' => 70,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Clindamycin',
            'slug' => Str::random(10),
            'satuan' => 'Kapsul',
            'harga' => 4000,
            'stok' => 45,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Dexamethasone',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 1800,
            'stok' => 90,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Erythromycin',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 3700,
            'stok' => 55,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Furosemide',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2000,
            'stok' => 65,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Gentamicin',
            'slug' => Str::random(10),
            'satuan' => 'Injeksi',
            'harga' => 5000,
            'stok' => 30,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Hydrochlorothiazide',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2400,
            'stok' => 75,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Isoniazid',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2100,
            'stok' => 85,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Ketoconazole',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 4200,
            'stok' => 40,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Levofloxacin',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 5000,
            'stok' => 50,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Metronidazole',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2700,
            'stok' => 60,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Nifedipine',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 3200,
            'stok' => 45,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Ofloxacin',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 4700,
            'stok' => 35,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Prednisone',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 1900,
            'stok' => 95,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Quinine',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 3800,
            'stok' => 25,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Rifampicin',
            'slug' => Str::random(10),
            'satuan' => 'Kapsul',
            'harga' => 4500,
            'stok' => 40,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Spironolactone',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 3100,
            'stok' => 50,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Tetracycline',
            'slug' => Str::random(10),
            'satuan' => 'Kapsul',
            'harga' => 3900,
            'stok' => 60,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Valacyclovir',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 5500,
            'stok' => 20,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Zidovudine',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 6000,
            'stok' => 15,
        ]);
    }
}
