<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kecanduan;
use App\Models\BasisAturan;
use Illuminate\Http\Request;

class RuleShowController extends Controller
{
    function index(Kecanduan $kecanduan, Request $request){
        $kecanduanId = $request->route('kecanduan');
        $rules = BasisAturan::orderBy('kecanduan_id')->get();
        $rule = $rules->where('kecanduan_id', $kecanduanId->id);
        $gejala = Gejala::whereNotIn('id', $rule->pluck('gejala_id'))->orderBy('id')->get();
        // dd($rules);
        // dd($gejala);
        // dd($kecanduanId->id);
        // dd($rule);
        return view('dashboard.aturan.edit', [
            'rules'=>$rule,
            'id_kecanduan'=>$kecanduanId->id,
            'kecanduan' => $kecanduan,
            'gejalas' => $gejala
        ]);
    
    }
}
