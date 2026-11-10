<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@sekolah.test'], [
            'name' => 'Admin',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::updateOrCreate(['email' => 'siswa@sekolah.test'], [
            'name' => 'Dimas',
            'password' => 'password',
            'role' => 'siswa',
            'nis' => '12345',
            'kelas' => 'XII RPL 1',
        ]);

        foreach (['Ruang Kelas', 'Toilet', 'Laboratorium', 'Lapangan'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
