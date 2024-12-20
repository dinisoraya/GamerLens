@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2"><i class="uil uil-heartbeat"></i> Tambah Gejala</h1>
</div>
<div class="col-lg-12">
    {{-- /dashboard/posts + method POST otomais ke method store --}}
<form action="/dashboard/gejala" method="post" class="mb-5">
    @csrf
  <div class="mb-3" style="width: 50%">
    <label for="kode_gejala" class="form-label">Kode Gejala :</label>
    <input type="text" name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror" id="kode_gejala" placeholder="Kode gejala" value="{{ old('kode_gejala') }}" autofocus>
    @error('kode_gejala')
        <div class="invalid-feedback">
            {{$message}}
        </div> 
    @enderror
  </div>
  <div class="mb-3" style="width: 50%">
    <label for="nama_gejala" class="form-label">Nama Gejala :</label>
    <input type="text" name="nama_gejala" class="form-control @error('nama_gejala') is-invalid @enderror" id="nama_gejala" placeholder="Nama Gejala" value="{{ old('nama_gejala') }}">
    @error('nama_gejala')
        <div class="invalid-feedback">
            {{$message}}
        </div> 
    @enderror
  </div>
  

  <button type="submit" class="btn btn-primary mt-3">Tambah Gejala</button>
</form>
</div>
@endsection