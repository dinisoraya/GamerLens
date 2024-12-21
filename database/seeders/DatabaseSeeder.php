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
        Gejala::create([
           'id' => '1',
            'kode_gejala' => 'G01',
            'nama_gejala' => 'Sulit berkonsentrasi saat belajar',
            'created_at' => '2024-12-19 21:08:40',
            'updated_at' => '2024-12-19 21:08:40',
        ]);
        Gejala::create([
            'id' => '2',
            'kode_gejala' => 'G02',
            'nama_gejala' => 'Sering mengakses game di waktu luang',
            'created_at' => '2024-12-19 21:09:09',
            'updated_at' => '2024-12-19 21:09:09,'
        ]);
        Gejala::create([
            'id' => '3',
            'kode_gejala' => 'G03',
            'nama_gejala' => 'Malas jika disuruh mengerjakan sesuatu selain bermain game',
            'created_at' => '2024-12-19 21:13:30',
            'updated_at' => '2024-12-19 21:13:30',
        ]);
        Gejala::create([
            'id' => '4',
            'kode_gejala' => 'G04',
            'nama_gejala' => 'Selalu meluangkan waktunya untuk bermain game',
            'created_at' => '2024-12-19 21:14:00',
            'updated_at' => '2024-12-19 21:14:00',
        ]);
        Gejala::create([
            'id' => '5',
            'kode_gejala' => 'G05',
            'nama_gejala' => 'Bermain game sampai lupa waktu',
            'created_at' => '2024-12-19 21:14:18',
            'updated_at' => '2024-12-19 21:14:18',
        ]);
        Gejala::create([
             'id' => '6',
            'kode_gejala' => 'G06',
            'nama_gejala' => 'Gelisah jika tidak bermain game',
            'created_at' => '2024-12-19 21:14:34',
            'updated_at' => '2024-12-19 21:14:34',
        ]);
        Gejala::create([
            'id' => '7',
            'kode_gejala' => 'G07',
            'nama_gejala' => 'Terus menerus memikiran tentang game',
            'created_at' => '2024-12-19 21:15:04',
            'updated_at' => '2024-12-19 21:15:04',
        ]);
        Gejala::create([
            'id' => '8',
            'kode_gejala' => 'G08',
            'nama_gejala' => 'Suka menyendiri di suatu tempat',
            'created_at' => '2024-12-19 21:15:28',
            'updated_at' => '2024-12-19 21:15:28',
        ]);
        Gejala::create([
            'id' => '9',
            'kode_gejala' => 'G09',
            'nama_gejala' => 'Tidak tertarik untuk bergaul dengan lingkungan sekitar',
            'created_at' => '2024-12-19 21:15:52',
            'updated_at' => '2024-12-19 21:15:52',
        ]);
        Gejala::create([
            'id' => '10',
            'kode_gejala' => 'G10',
            'nama_gejala' => 'Rela mengeluarkan banyak uang demi game',
            'created_at' => '2024-12-19 21:16:22',
            'updated_at' => '2024-12-19 21:16:22',
        ]);
        Gejala::create([
            'id' => '11',
            'kode_gejala' => 'G11',
            'nama_gejala' => 'Pola hidup yang tidak teratur',
            'created_at' => '2024-12-19 21:16:40',
            'updated_at' => '2024-12-19 21:16:40',
        ]);
        Gejala::create([
            'id' => '12',
            'kode_gejala' => 'G12',
            'nama_gejala' => 'Jika diajak berbicara selalu tentang game',
            'created_at' => '2024-12-19 21:17:05',
            'updated_at' => '2024-12-19 21:17:05',
        ]);
        Gejala::create([
            'id' => '13',
            'kode_gejala' => 'G13',
            'nama_gejala' => 'Sering berhalusinasi',
            'created_at' => '2024-12-19 21:17:25',
            'updated_at' => '2024-12-19 21:17:25',
        ]);
        Gejala::create([
            'id' => '14',
            'kode_gejala' => 'G14',
            'nama_gejala' => 'Menganggap Game Sebagai Teman Terbaik',
            'created_at' => '2024-12-19 21:17:44',
            'updated_at' => '2024-12-19 21:17:44',
        ]);
    }
}
