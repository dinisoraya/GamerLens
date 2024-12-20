<?php

namespace App\Http\Controllers;

use App\Models\Kecanduan;
use Illuminate\Http\Request;

class KecanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kecanduan.index', [
            'kecanduans' => Kecanduan::orderBy('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.kecanduan.create", []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kecanduan' => 'required|unique:kecanduans',
            'nama_kecanduan' => 'required',
            'saran_kecanduan' => 'required'

        ]);

        Kecanduan::create($validatedData);
        return redirect('/dashboard/kecanduan')->with('success', 'Data Kecanduan ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecanduan $kecanduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecanduan $kecanduan)
    {
        return view("dashboard.kecanduan.edit", [
            'kecanduan'=>$kecanduan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecanduan $kecanduan)
    {
        $rules=[
            'kode_kecanduan' => 'required',
            'nama_kecanduan' => 'required',
            'saran_kecanduan' => 'required'
        ];
        if ($request->kode_kecanduan !== $kecanduan->kode_kecanduan) {
            $rules['kode_kecanduan'] = 'unique:kecanduans';
        }
        $validatedData = $request->validate($rules);
        Kecanduan::where('id', $kecanduan->id)->update($validatedData);

        return redirect('/dashboard/kecanduan')->with('success', 'Data Kecanduan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecanduan $kecanduan)
    {
        Kecanduan::destroy($kecanduan->id);
        return redirect('/dashboard/kecanduan')->with('success', 'kecanduan berhasil dihapus');
    }
}
