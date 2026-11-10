<?php

namespace Database\Seeders;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class AspirationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'user' => ['name' => 'Rina Amelia', 'email' => 'rina@sekolah.test', 'nis' => '22001', 'kelas' => 'X TKJ 1'],
                'aspirasi' => [
                    ['Ruang Kelas', 'Kelas X TKJ 1', 'Kipas angin di bagian belakang kelas mati sejak minggu lalu, ruangan jadi panas saat siang.'],
                    ['Toilet', 'Toilet putri lantai 2', 'Keran wastafel bocor dan air terus menetes, lantai jadi licin.'],
                ],
            ],
            [
                'user' => ['name' => 'Bagas Pratama', 'email' => 'bagas@sekolah.test', 'nis' => '22002', 'kelas' => 'XI RPL 2'],
                'aspirasi' => [
                    ['Laboratorium', 'Lab Komputer 1', 'Tiga komputer di baris belakang tidak bisa menyala dan mouse beberapa PC rusak.'],
                ],
            ],
            [
                'user' => ['name' => 'Siti Nurhaliza', 'email' => 'siti@sekolah.test', 'nis' => '22003', 'kelas' => 'XI AKL 1'],
                'aspirasi' => [
                    ['Ruang Kelas', 'Kelas XI AKL 1', 'Proyektor buram dan sering mati sendiri saat pelajaran berlangsung.'],
                    ['Lapangan', 'Lapangan basket', 'Ring basket sebelah utara miring dan jaringnya sudah sobek.'],
                ],
            ],
            [
                'user' => ['name' => 'Andi Saputra', 'email' => 'andi@sekolah.test', 'nis' => '22004', 'kelas' => 'XII TKJ 2'],
                'aspirasi' => [
                    ['Toilet', 'Toilet putra dekat kantin', 'Pintu toilet tidak bisa dikunci dan lampunya mati.'],
                ],
            ],
            [
                'user' => ['name' => 'Putri Lestari', 'email' => 'putri@sekolah.test', 'nis' => '22005', 'kelas' => 'X DKV 1'],
                'aspirasi' => [
                    ['Laboratorium', 'Lab IPA', 'Wastafel lab tersumbat dan beberapa kursi patah.'],
                    ['Lapangan', 'Lapangan upacara', 'Banyak genangan air setelah hujan karena saluran air tersumbat.'],
                ],
            ],
        ];

        foreach ($data as $item) {
            $user = User::updateOrCreate(
                ['email' => $item['user']['email']],
                $item['user'] + ['password' => 'password', 'role' => 'siswa'],
            );

            foreach ($item['aspirasi'] as [$kategori, $lokasi, $keterangan]) {
                Aspiration::firstOrCreate(
                    ['user_id' => $user->id, 'location' => $lokasi],
                    [
                        'category_id' => Category::firstOrCreate(['name' => $kategori])->id,
                        'description' => $keterangan,
                        'status' => 'Menunggu',
                    ],
                );
            }
        }
    }
}
