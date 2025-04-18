<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'syahrizal',
            'slug' => 'sgygyvxaf',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'rini',
            'slug' => 'ftsfatsa',
            'email' => 'petugas_pendaftaran@example.com',
            'password' => bcrypt('password'),
            'role' => 'petugas_pendaftaran'
        ]);

        User::factory()->create([
            'name' => 'abigail',
            'slug' => 'satftfa',
            'email' => 'dokter@example.com',
            'password' => bcrypt('password'),
            'role' => 'dokter'
        ]);

        User::factory()->create([
            'name' => 'jeff',
            'slug' => 'ftfsasta',
            'email' => 'kasir@example.com',
            'password' => bcrypt('password'),
            'role' => 'kasir'
        ]);
    }
}
