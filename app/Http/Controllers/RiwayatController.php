<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level!=='admin') {
            $riwayat = RiwayatDiagnosa::where('id_pengguna',Auth::user()->id)->with('user');
        }else{
            $riwayat = RiwayatDiagnosa::with('user');
        }
        // dd($riwayat->get());
        if (auth()->user()->level == 'admin') {
            return view('dashboard.riwayat.index', [
                'riwayats' => $riwayat->orderBy('id', 'desc')->get(),
                // 'active' => 'Login'
            ]);
        } else {
            return view('dashboard.user.riwayat', [
                'riwayats' => $riwayat->orderBy('id', 'desc')->get(),
                // 'active' => 'Login'
            ]);
        }
        
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
        $riwayat = RiwayatDiagnosa::with(['user', 'kecanduan'])->find($id);
        // dd($riwayat);
        if (Auth::user()->level!='admin') {
            if (Auth::user()->id !== $riwayat->id_pengguna) {
                return abort(403);
            }
        }

        // dd($riwayat->gejala_pengguna);
        // dd($unserializedData = unserialize($riwayat->gejala_pengguna));
        
        // dd($riwayat);
        
        if (auth()->user()->level == 'admin') {
            return view('dashboard.riwayat.show', compact('riwayat'));
        } else {
            return view('dashboard.user.hasil', compact('riwayat'));
        }
        // return view('dashboard.riwayat.show', [
        //     'riwayat' => $riwayat,
        // ]);
        
        // echo "hallo";
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
    public function destroy(RiwayatDiagnosa $riwayat)
    {
        RiwayatDiagnosa::destroy($riwayat->id);
        return redirect('/dashboard/riwayat')->with('success', 'Data Gejala berhasil dihapus');
    }
}
