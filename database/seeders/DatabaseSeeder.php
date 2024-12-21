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


        // Gejala
        
    }
}
