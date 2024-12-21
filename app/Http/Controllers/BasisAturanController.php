<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kecanduan;
use App\Models\BasisAturan;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class BasisAturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $gejalas = Gejala::with('kecanduans')->get();
        $kecanduans = Kecanduan::all();

        return view('dashboard.aturan.index', compact('gejalas', 'kecanduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kecanduanId = $request->route('kecanduan');
        $id = request()->only('id');
        $rule = BasisAturan::orderBy('kecanduan_id')->where('kecanduan_id', $id);
        $data = request()->except(['_token', 'id']);
        $idArray = request()->only('id');
        $id = $idArray['id'];

        BasisAturan::where('kecanduan_id', $id)->delete();
        foreach ($data as $key => $value) {
            // dd($id);
            if ($value !== null && $value>0) {
                BasisAturan::create([
                    'kecanduan_id' => $id,
                    'gejala_id' => $key,
                    'value_cf' => $value
                ]);
            }
        }
        return redirect('/dashboard/basis-aturan/data/'.$id)->with('success', 'Rule Berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     */
    public function show(BasisAturan $basisAturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BasisAturan $basisAturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BasisAturan $basisAturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BasisAturan $basisAturan)
    {
        //
    }
}
