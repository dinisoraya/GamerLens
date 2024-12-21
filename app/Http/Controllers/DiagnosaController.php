<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kecanduan;
use App\Models\BasisAturan;
use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BasisAturan $rule, Kecanduan $kecanduan, Gejala $gejala)
    {
        if (auth()->user()->level == 'admin') {
            return view('dashboard.diagnosa.index', [
                'rules' => $rule->orderBy('gejala_id')->get(),
                'kecanduan' => $kecanduan->get(),
                'gejala' => $gejala->orderBy('id')->get(),
                // 'gejala' => $gejala->inRandomOrder(10)->get(),
            ]);
        } else {
            return view('dashboard.user.index', [
                'rules' => $rule->orderBy('gejala_id')->get(),
                'kecanduan' => $kecanduan->get(),
                'gejala' => $gejala->orderBy('id')->get(),
                // 'gejala' => $gejala->inRandomOrder(10)->get(),
            ]);
        }
    }
    function cf(BasisAturan $rule, Kecanduan $penyakit, Gejala $gejala)
    {
        $rules = $rule->orderBy('gejala_id')->get();
        $penyakit = $penyakit->get();
        $gejala = $gejala->get();
        $users = request()->except('_token');
        $hasil = [];

        
        foreach ($penyakit as $key => $sakit) {
            $i = $sakit->id;
            $idGejala = [];
            $CFG = [];
            $gejalaTuru = [];
            $nilaiCF = $rules->where('kecanduan_id', $i);

            foreach ($nilaiCF as $key) {
                $gejalaTuru[$key->gejala_id] = $key->value_cf;
            }
        
            // memasukkan menghitung nilai CFG dengan looping dari array gejalaturu  
            foreach ($gejalaTuru as $key => $gejala) {
                $CFG[$key] = $users[$key] * $gejala;
                echo 'CF[H,E] G' . $key . ' = ' . $users[$key] . '*' . $gejala . ' : ' . $CFG[$key];
                echo '<br>';
            }

            // memasukkan id gejala kedaalam $idgejala untuk satu persatu penyakit
            $rulex = $rules->where('kecanduan_id', $i);
            foreach ($rulex as $aturan) {
                array_push($idGejala, $aturan->gejala_id);
            }

            $cfOld = 0;
            $namaPentakit = $penyakit->where('id', $i)->first();
            echo 'Perhitungan CFCombine';
            echo '<br>';
            echo $namaPentakit->nama_kecanduan;
            echo '<br>';

            for ($j = 0; $j < count($idGejala); $j++) {
                if ($j < 1) {
                    echo 'CFCombine CF[H,E] G' . $idGejala[$j] . ', G' . $idGejala[$j + 1] . ' : ';
                    echo $cfOld = $CFG[$idGejala[$j]] + $CFG[$idGejala[$j + 1]] * (1 - $CFG[$idGejala[$j]]);
                    echo '<br>';
                } elseif ($j > 1) {
                    echo 'CFCombine CF[H,E] old' . ', G' . $idGejala[$j] . ' : ';
                    echo $cfOld = $cfOld + ($CFG[$idGejala[$j]] * (1 - $cfOld));
                    echo '<br>';
                }
            }
            echo '<br>';
            echo '<hr>';
            $hasil[$i]  = $cfOld;
        }

        $maxHasil = max($hasil);
        $namaPenyakit = $penyakit->where('id', array_search($maxHasil, $hasil))->first();
        echo '<br>';
        echo 'HASIL AKHIR CF: ' . $namaPenyakit->nama_kecanduan . ' ( ';
        echo $maxHasil * 100 . '% )';
        echo '<br>';

        echo 'data';
        echo '<br>';
        echo round($maxHasil, 2) ;
        echo '<br>';
        echo $namaPenyakit->nama_kecanduan;
    }
    function cfclean(BasisAturan $rule, Kecanduan $kecanduan, Gejala $gejala)
    {
        $rules = $rule->orderBy('gejala_id')->get();
        $kecanduan = $kecanduan->get();
        $gejala = $gejala->get();
        $users = request()->except('_token');
        $hasil = [];

        foreach ($kecanduan as $key => $candu) {
            $i = $candu->id;
            $idGejala = [];
            $CFG = [];
            $gejalaTuru = [];
            $nilaiCF = $rules->where('kecanduan_id', $i);

            foreach ($nilaiCF as $key) {
                $gejalaTuru[$key->gejala_id] = $key->value_cf;
            }

            // memasukkan menghitung nilai CFG dengan looping dari array gejalaturu  
            foreach ($gejalaTuru as $key => $gejala) {
                $CFG[$key] = $users[$key] * $gejala;
            }

            // memasukkan id gejala kedaalam $idgejala untuk satu persatu kecanduan
            $rulex = $rules->where('kecanduan_id', $i);
            foreach ($rulex as $aturan) {
                array_push($idGejala, $aturan->gejala_id);
            }

            $cfOld = 0;
            for ($j = 0; $j < count($idGejala); $j++) {
                if ($j < 1) {    
                    $cfOld = $CFG[$idGejala[$j]] + $CFG[$idGejala[$j + 1]] * (1 - $CFG[$idGejala[$j]]);
                
                } elseif ($j > 1) {
                    $cfOld = $cfOld + ($CFG[$idGejala[$j]] * (1 - $cfOld));
                }
            }
            $hasil[$i]  = $cfOld;
        }

        $maxHasil = max($hasil);
        $namaKecanduan = $kecanduan->where('id', array_search($maxHasil, $hasil))->first();
        
        $gejalaUser = [];
        foreach ($users as $key => $value) {
            if($value>0){
                $nGejala = Gejala::firstWhere('id', $key);
                array_push($gejalaUser, $nGejala->nama_gejala);
            }
        }
        
        $precision = 4;
        $factor = pow(10, $precision);
        $maxHasil = floor($maxHasil * $factor) / $factor;
        
        $riwayatDiagnosa = RiwayatDiagnosa::create([
            'id_pengguna' => Auth::user()->id,
            'id_kecanduan' => $namaKecanduan->id,
            'tingkat_kecanduan' => $namaKecanduan->nama_kecanduan,
            'gejala_pengguna' => serialize($gejalaUser),
            'value_cf' => $maxHasil,
        ]);

        return redirect('/dashboard/riwayat/' . $riwayatDiagnosa->id);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
