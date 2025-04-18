<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->create([
            'nama' => 'Ahmad Santoso',
            'slug' => 'vxtaxtafya',
            'nip' => '197812102005121001',
            'jabatan' => 'Kepala Seksi',
            'alamat' => 'Jl. Melati No. 10, Jakarta',
            'no_hp' => '081234567890',
        ]);

        Employee::factory()->create([
            'nama' => 'Rina Kartika',
            'slug' => 'avzgatxft,',
            'nip' => '198103152006042002',
            'jabatan' => 'Staf Administrasi',
            'alamat' => 'Jl. Kenanga No. 5, Bandung',
            'no_hp' => '082112345678',
        ]);

        Employee::factory()->create([
            'nama' => 'Budi Prasetyo',
            'slug' => 'xatxfxyaxx',
            'nip' => '197906202004051003',
            'jabatan' => 'Bendahara',
            'alamat' => 'Jl. Cendana No. 12, Surabaya',
            'no_hp' => '085267890123',
        ]);

        Employee::factory()->create([
            'nama' => 'Dewi Lestari',
            'slug' => 'xaxvttra',
            'nip' => '198412032007032004',
            'jabatan' => 'Sekretaris',
            'alamat' => 'Jl. Anggrek No. 8, Yogyakarta',
            'no_hp' => '081234567891',
        ]);

        Employee::factory()->create([
            'nama' => 'Slamet Riyadi',
            'slug' => 'xuabyugxya,',
            'nip' => '198101012005061001',
            'jabatan' => 'Pengelola Data',
            'alamat' => 'Jl. Merpati No. 22, Semarang',
            'no_hp' => '089876543210',
        ]);

        Employee::factory()->create([
            'nama' => 'Indah Permatasari',
            'slug' => 'xjabxurqrqq',
            'nip' => '198702112009122005',
            'jabatan' => 'Analis Kepegawaian',
            'alamat' => 'Jl. Mawar No. 4, Medan',
            'no_hp' => '087812345678',
        ]);

        Employee::factory()->create([
            'nama' => 'Rizky Hidayat',
            'slug' => 'zknxsyauqft1',
            'nip' => '198605052010062006',
            'jabatan' => 'Teknisi Komputer',
            'alamat' => 'Jl. Flamboyan No. 14, Makassar',
            'no_hp' => '083812341234',
        ]);

        Employee::factory()->create([
            'nama' => 'Siti Nurhaliza',
            'slug' => 'zajbxaxyuqxm',
            'nip' => '198909092011092007',
            'jabatan' => 'Operator Sistem',
            'alamat' => 'Jl. Sakura No. 3, Denpasar',
            'no_hp' => '081223344556',
        ]);

        Employee::factory()->create([
            'nama' => 'Fajar Nugroho',
            'slug' => 'ajbxajxbaj',
            'nip' => '198311232006012008',
            'jabatan' => 'Pustakawan',
            'alamat' => 'Jl. Teratai No. 6, Balikpapan',
            'no_hp' => '085266677788',
        ]);

        Employee::factory()->create([
            'nama' => 'Lestari Wulandari',
            'slug' => 'xjaxiugxaguxg',
            'nip' => '198505152005031009',
            'jabatan' => 'Arsiparis',
            'alamat' => 'Jl. Cemara No. 9, Jayapura',
            'no_hp' => '082133355577',
        ]);
    }
}
