<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gejala;
use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatDiagnosa::with('user');
        return view('dashboard.index', [
            'riwayats' =>$riwayat->orderBy('id', 'desc')->take(10)->get(),
            'user' => User::all()->count(),
            'gejala' => Gejala::all()->count(),
            'riwayat' => RiwayatDiagnosa::all()->count(),
        ]);
    }
}
