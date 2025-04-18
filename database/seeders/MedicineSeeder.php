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
            'nama_obat' => 'Paracetamol',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2000,
            'stok' => 100,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Amoxicillin',
            'slug' => Str::random(10),
            'satuan' => 'Kapsul',
            'harga' => 3000,
            'stok' => 80,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Salbutamol',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2500,
            'stok' => 60,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Cetirizine',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 1500,
            'stok' => 75,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Metformin',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 1800,
            'stok' => 90,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Omeprazole',
            'slug' => Str::random(10),
            'satuan' => 'Kapsul',
            'harga' => 3500,
            'stok' => 50,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Loperamide',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 1700,
            'stok' => 65,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Ibuprofen',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2800,
            'stok' => 120,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Ranitidine',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 2200,
            'stok' => 55,
        ]);

        Medicine::factory()->create([
            'nama_obat' => 'Vitamin B Complex',
            'slug' => Str::random(10),
            'satuan' => 'Tablet',
            'harga' => 3000,
            'stok' => 110,
        ]);
    }
}
