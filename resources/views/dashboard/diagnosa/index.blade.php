@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="uil uil-stethoscope-alt"></i> Diagnosa</h1>
    </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-12">
    <form id="form" action="/kirimcf" method="POST">
    @csrf
        <table class="diagnosa">
            <tr>
            <th>No</th>
            <th>Gejala</th>
            <th>Keyakinan</th>
        </tr>
        @foreach ($gejala as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_gejala }} : </td>
            <td>
                <select name="{{ $item->id }}" required>
                    <option value="0" selected>TIDAK</option>
                    <option value="1">IYA</option>
                </select>
            </td>
        </tr>
        @endforeach
        </table>
        <input type="submit" value="Diagnosa Sekarang">
        </form>
</div>
@endsection