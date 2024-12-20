@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="uil uil-clipboard-alt"></i> Riwayat Diagnosa</h1>
    </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{ session('success') }}
</div>
@endif
    <div class="table-responsive col-lg-12">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">umur</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Tingkat Kecanduan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($riwayats as $riwayat)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $riwayat->user->nama}}</td>
              <td>{{ \Carbon\Carbon::parse($riwayat->user->tanggal_lahir)->age}}</td>
              <td>{{ $riwayat->user->jenis_kelamin}}</td>
              <td>{{ $riwayat->tingkat_kecanduan}} ({{ $riwayat->value_cf*100 }}%)</td>
              <td>{{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y')}} </td>
              <td style="width: 100px; ">
                <a href="/dashboard/riwayat/{{ $riwayat->id }}" class="badge text-bg-success"><i class="uil uil-eye"></i></a>
                <form action="/dashboard/riwayat/{{ $riwayat->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="uil uil-times-circle"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection