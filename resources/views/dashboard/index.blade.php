@extends('dashboard.layouts.main')
@section('container')
        <div class="dash-content">
            @if (session()->has('success'))
            <div class="alert alert-success col-lg-10 mt-5" role="alert">
            {{ session('success') }}
            </div>
            @endif
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Pengguna</span>
                        <span class="number">{{ $user }}</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-clipboard-alt"></i>
                        <span class="text">Total Diagnosa</span>
                        <span class="number">{{ $riwayat }}</span>
                    </div>
                    <div class="box box3">
                       <i class="uil uil-heartbeat"></i>
                        <span class="text">Total Gejala</span>
                        <span class="number">{{ $gejala }}</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Diagnosa terbaru</span>
                </div>

                <div class="activity-data">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tingkat Kecanduan</th>
                            <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayats as $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $riwayat->user->nama}}</td>
                                <td>{{ $riwayat->tingkat_kecanduan}} ({{ $riwayat->value_cf*100 }}%)</td>
                                <td>{{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y') }}</td>
                                {{-- <td>{{ $riwayat->created_at}} </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection