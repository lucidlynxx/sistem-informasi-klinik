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
            'tindakan' => 'Cek Tekanan Darah',
            'slug' => Str::random(10),
            'biaya' => 25000,
            'keterangan' => 'Pengukuran tekanan darah pasien menggunakan tensimeter.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Mata',
            'slug' => Str::random(10),
            'biaya' => 80000,
            'keterangan' => 'Pemeriksaan penglihatan dan kesehatan mata.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan THT',
            'slug' => Str::random(10),
            'biaya' => 85000,
            'keterangan' => 'Pemeriksaan kesehatan telinga, hidung, dan tenggorokan.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemberian Obat Injeksi',
            'slug' => Str::random(10),
            'biaya' => 70000,
            'keterangan' => 'Pemberian obat melalui injeksi.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Terapi Fisioterapi',
            'slug' => Str::random(10),
            'biaya' => 130000,
            'keterangan' => 'Terapi fisik untuk rehabilitasi pasien.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemasangan Gips',
            'slug' => Str::random(10),
            'biaya' => 180000,
            'keterangan' => 'Tindakan medis untuk imobilisasi tulang yang patah.',
        ]);

        Action::factory()->create([
            'tindakan' => 'USG (Ultrasonografi)',
            'slug' => Str::random(10),
            'biaya' => 250000,
            'keterangan' => 'Pemeriksaan organ dalam menggunakan gelombang ultrasonik.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Kehamilan',
            'slug' => Str::random(10),
            'biaya' => 100000,
            'keterangan' => 'Pemeriksaan kesehatan ibu hamil dan janin.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemberian Vaksinasi',
            'slug' => Str::random(10),
            'biaya' => 120000,
            'keterangan' => 'Pemberian vaksin untuk pencegahan penyakit.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Penjahitan Luka',
            'slug' => Str::random(10),
            'biaya' => 90000,
            'keterangan' => 'Tindakan medis untuk menjahit luka robek.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Perawatan Luka Diabetes',
            'slug' => Str::random(10),
            'biaya' => 110000,
            'keterangan' => 'Perawatan luka khusus untuk pasien diabetes.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemberian Nebulizer Anak',
            'slug' => Str::random(10),
            'biaya' => 65000,
            'keterangan' => 'Terapi uap untuk anak-anak dengan gangguan pernapasan.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Terapi Inhalasi',
            'slug' => Str::random(10),
            'biaya' => 70000,
            'keterangan' => 'Pemberian obat lewat inhalasi untuk penyakit saluran napas.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Kolesterol',
            'slug' => Str::random(10),
            'biaya' => 40000,
            'keterangan' => 'Cek kadar kolesterol dalam darah.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Cek Asam Urat',
            'slug' => Str::random(10),
            'biaya' => 35000,
            'keterangan' => 'Tes untuk mengetahui kadar asam urat dalam darah.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemberian Infus Vitamin',
            'slug' => Str::random(10),
            'biaya' => 100000,
            'keterangan' => 'Pemasangan infus untuk pemberian vitamin langsung ke darah.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Paru-paru',
            'slug' => Str::random(10),
            'biaya' => 95000,
            'keterangan' => 'Pemeriksaan kesehatan paru-paru.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan Ginjal',
            'slug' => Str::random(10),
            'biaya' => 150000,
            'keterangan' => 'Pemeriksaan fungsi ginjal melalui laboratorium.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemasangan NGT (Nasogastric Tube)',
            'slug' => Str::random(10),
            'biaya' => 115000,
            'keterangan' => 'Pemasangan selang makan lewat hidung.',
        ]);

        Action::factory()->create([
            'tindakan' => 'Pemeriksaan HIV/AIDS',
            'slug' => Str::random(10),
            'biaya' => 200000,
            'keterangan' => 'Tes darah untuk mendeteksi HIV/AIDS.',
        ]);
    }
}
