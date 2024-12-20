@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="uil uil-stethoscope-alt"></i> Hasil Diagnosis</h1>
</div>
<div class="col-lg-12">

                {{-- <a href="/dashboard/diagnosa" class="btn btn-primary mb-2"><i class="fas fa-file"></i> Diagnosa Baru</a> --}}
                <a href="/dashboard/cetak/{{ $riwayat->id }}" target="blank" class="btn btn-warning mb-2"><i class="uil uil-print"></i> Cetak</a>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td width="200px">Nama Pasien</td>
                                <td>: {{ $riwayat->user->nama }}</td>
                            </tr>
                            <tr>
                                <td width="200px">Jenis Kelamin</td>
                                <td>: {{ $riwayat->user->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td width="200px">Umur</td>
                                <td>: {{ \Carbon\Carbon::parse($riwayat->user->tanggal_lahir)->age}}</td>
                            </tr>

                            <tr>
                                <td>Tingkat Kecanduan </td>
                                <td>: {{ $riwayat->tingkat_kecanduan }}</td>
                            </tr>

                            <tr>
                                <td>Persentase</td>
                                <td>: {{ $riwayat->value_cf * 100 . '%' }}</td>
                            </tr>

                            <tr>
                                <td>Solusi</td>
                                <td>: {!! $riwayat->kecanduan->saran_kecanduan !!}</td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                            </tr>

                            @foreach (unserialize($riwayat->gejala_pengguna) as $gejala)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gejala }}</td>
                                </tr>
                                @endforeach

                        </table>
            </div>
        </div>
</div>
@endsection