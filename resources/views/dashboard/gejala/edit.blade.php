@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="uil uil-heartbeat"></i> Ubah Gejala</h1>
</div>
<div class="col-lg-12">
    {{-- /dashboard/posts + method POST otomais ke method store --}}
<form action="/dashboard/gejala/{{ $gejala->id }}" method="post" class="mb-5">
    @method("put")
    @csrf
  <div class="mb-3" style="width: 50%">
    <label for="kode_gejala" class="form-label">Kode gejala :</label>
    <input type="text" name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror" id="title" placeholder="New Category Name" autofocus value="{{ old('kode_gejala',$gejala->kode_gejala) }}">
    @error('kode_gejala')
        <div class="invalid-feedback">
            {{$message}}
        </div> 
    @enderror
  </div>
  <div class="mb-3" style="width: 50%">
    <label for="nama_gejala" class="form-label">Nama Gejala :</label>
    <input type="text" name="nama_gejala" class="form-control @error('nama_gejala') is-invalid @enderror" id="nama_gejala" placeholder="new-post-slug" value="{{ old('nama_gejala',$gejala->nama_gejala) }}">
    @error('nama_gejala')
        <div class="invalid-feedback">
            {{$message}}
        </div> 
    @enderror
  </div>

  <button type="submit" class="btn btn-primary mt-3">Ubah Gejala</button>
</form>
</div>
@endsection