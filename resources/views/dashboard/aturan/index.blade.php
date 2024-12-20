@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="uil uil-syringe"></i> Basis Aturan</h1>
    </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="table-responsive col-lg-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center">Kode</th>
                        @foreach ($kecanduans as $kecanduan)
                            <th style="text-align: center">{{ $kecanduan->kode_kecanduan }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gejalas as $gejala)
                    <tr>
                        <td style="text-align: center">{{ $gejala->kode_gejala }}</td>
                        @foreach ($kecanduans as $kecanduan)
                            <td style="text-align: center">
                                @if($gejala->kecanduans->contains($kecanduan->id))
                                    &#x2714;
                                @endif
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="table-responsive col-lg-4">
            <table class="diagnosa">
            @foreach ($kecanduans as $item)
            <tr>
                <td>{{ $item->nama_kecanduan }}</td>
                <td>
                    {{-- <button>Basis Aturan</button> --}}
                    <a href="/dashboard/basis-aturan/data/{{ $item->id }}" type="button" class="btn btn-primary"><i class="uil uil-syringe"></i> Ubah Rule</a>

                    {{-- <input type="submit" value="Diagnosa Sekarang"> --}}
                </td>
            </tr>
            @endforeach
            </table>
    </div>
</div>
@endsection