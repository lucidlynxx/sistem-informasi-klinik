<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::factory()->create([
            'slug' => 'agsgaysug',
            'kota_kabupaten' => 'Jakarta Selatan',
        ]);

        Region::factory()->create([
            'slug' => 'sjbakbcs',
            'kota_kabupaten' => 'Bandung',
        ]);

        Region::factory()->create([
            'slug' => 'avgxaxX',
            'kota_kabupaten' => 'Semarang',
        ]);

        Region::factory()->create([
            'slug' => 'xhastyx',
            'kota_kabupaten' => 'Sleman',
        ]);

        Region::factory()->create([
            'slug' => 'uxaugxysfr',
            'kota_kabupaten' => 'Surabaya',
        ]);

        Region::factory()->create([
            'slug' => 'xavgvxyafxm',
            'kota_kabupaten' => 'Denpasar',
        ]);

        Region::factory()->create([
            'slug' => 'xhavxtfsty',
            'kota_kabupaten' => 'Medan',
        ]);

        Region::factory()->create([
            'slug' => 'lmxasjihuw',
            'kota_kabupaten' => 'Makassar',
        ]);

        Region::factory()->create([
            'slug' => 'jbxagxyft5',
            'kota_kabupaten' => 'Balikpapan',
        ]);

        Region::factory()->create([
            'slug' => 'xjaxbygftfta',
            'kota_kabupaten' => 'Jayapura',
        ]);
    }
}
