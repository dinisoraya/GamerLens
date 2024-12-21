<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Gejala;
use App\Models\Kecanduan;
use App\Models\BasisAturan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'level' => 'admin',
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '2001-01-01',
            'password' => bcrypt('password')
        ]);

        
        // Kecanduan
        Kecanduan::create([
            'kode_kecanduan' => 'P01',
            'nama_kecanduan' => 'Kecanduan Tinggi',
            'saran_kecanduan' => '<ul>
                <li>Carilah orang terdekat untuk selalu mengingatkan mengurangi waktu untuk memakai gadget.</li>
                <li>Fokus pada hal yang ini dicapai dan tujuan hidup.</li>
                <li>Alihkan perhatian ke aktifitas positif atau mencari berkumpul dengan orang lain.</li>
            </ul>',
        ]);
        Kecanduan::create([
            'kode_kecanduan' => 'P02',
            'nama_kecanduan' => 'Kecanduan Sedang',
            'saran_kecanduan' => '<ul>
                <li>Lakukan komunikasi dengan orang terdekat dan orang lain.</li>
                <li>Imbangi dengan aktifitas positif.</li>
                <li>Memperbanyak kegiatan lagi agar sedikit mengurangi terhadap bermain game online.</li>
            </ul>',
        ]);
        Kecanduan::create([
            'kode_kecanduan' => 'P03',
            'nama_kecanduan' => 'Kecanduan Rendah',
            'saran_kecanduan' => '<ul>
                <li>Melakukan aktifitas atau kegiatan positif.</li>
                <li>Menjaga komunikasi.</li>
                <li>Jaga Kesehatan fisik dan pikiran.</li>
            </ul>',
        ]);

        // Basis Aturan
        BasisAturan::insert([
            [
                'id' => 16,
                'kecanduan_id' => 1,
                'gejala_id' => 1,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 17,
                'kecanduan_id' => 1,
                'gejala_id' => 3,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 18,
                'kecanduan_id' => 1,
                'gejala_id' => 5,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 19,
                'kecanduan_id' => 1,
                'gejala_id' => 9,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 20,
                'kecanduan_id' => 1,
                'gejala_id' => 10,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 21,
                'kecanduan_id' => 1,
                'gejala_id' => 13,
                'value_cf' => 0.80,
                'created_at' => '2024-12-19 14:24:37',
                'updated_at' => '2024-12-19 14:24:37'
            ],
            [
                'id' => 22,
                'kecanduan_id' => 2,
                'gejala_id' => 6,
                'value_cf' => 0.40,
                'created_at' => '2024-12-19 14:26:56',
                'updated_at' => '2024-12-19 14:26:56'
            ],
            [
                'id' => 23,
                'kecanduan_id' => 2,
                'gejala_id' => 8,
                'value_cf' => 0.40,
                'created_at' => '2024-12-19 14:26:56',
                'updated_at' => '2024-12-19 14:26:56'
            ],
            [
                'id' => 24,
                'kecanduan_id' => 2,
                'gejala_id' => 12,
                'value_cf' => 0.40,
                'created_at' => '2024-12-19 14:26:56',
                'updated_at' => '2024-12-19 14:26:56'
            ],
            [
                'id' => 25,
                'kecanduan_id' => 2,
                'gejala_id' => 14,
                'value_cf' => 0.40,
                'created_at' => '2024-12-19 14:26:56',
                'updated_at' => '2024-12-19 14:26:56'
            ],
            [
                'id' => 26,
                'kecanduan_id' => 3,
                'gejala_id' => 11,
                'value_cf' => 0.20,
                'created_at' => '2024-12-19 14:28:33',
                'updated_at' => '2024-12-19 14:28:33'
            ],
            [
                'id' => 27,
                'kecanduan_id' => 3,
                'gejala_id' => 2,
                'value_cf' => 0.20,
                'created_at' => '2024-12-19 14:28:33',
                'updated_at' => '2024-12-19 14:28:33'
            ],
            [
                'id' => 28,
                'kecanduan_id' => 3,
                'gejala_id' => 4,
                'value_cf' => 0.20,
                'created_at' => '2024-12-19 14:28:33',
                'updated_at' => '2024-12-19 14:28:33'
            ]
        ]);
        // Gejala
        
    }
}
