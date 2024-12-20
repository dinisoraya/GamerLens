<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.gejala.index', [
            'gejalas' => Gejala::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.gejala.create", [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_gejala' => 'required|unique:gejalas',
            'nama_gejala' => 'required',

        ]);

        Gejala::create($validatedData);
        return redirect('/dashboard/gejala')->with('success', 'Data Gejala ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        return view("dashboard.gejala.edit", [
            'gejala'=>$gejala,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $rules = [
            'kode_gejala' => 'required',
            'nama_gejala' => 'required',
        ];
        if ($request->kode_gejala !== $gejala->kode_gejala) {
            $rules['kode_gejala'] = 'unique:gejalas';
        }
        $validatedData = $request->validate($rules);
        Gejala::where('id', $gejala->id)->update($validatedData);

        return redirect('/dashboard/gejala')->with('success', 'Data Kecanduan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        Gejala::destroy($gejala->id);
        return redirect('/dashboard/gejala')->with('success', 'Data Gejala berhasil dihapus');
    }
}
