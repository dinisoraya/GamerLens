<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerLens</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">GamerLens</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ asset('/#hero') }}" class="active">Home<br></a></li>
                    @if(Auth::check())
                        <!-- If the user is logged in, show the Diagnosa menu -->
                        <li><a href="{{ asset('/dashboard/diagnosa') }}">Diagnosa</a></li>
                        <li><a href="{{ asset('/dashboard/riwayat') }}">Riwayat Diagnosa</a></li>
                        <li class="dropdown"><a href="#"><span>{{ auth()->user()->nama }}</span>  <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                            {{-- <li><a href="#">Profile</a></li> --}}
                            <li><a href="{{ asset('/logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                    @else
                        <!-- If the user is not logged in, show the Login button -->
                        <li><a class="btn-getstarted flex-md-shrink-0" href="/login">Login</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
    <div class="container-fluid main-content vh-100">
        <div class="row vh-100">
            <div class="col-md-8 px-4 order-md-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
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
                                <th scope="col">Tingkat Kecanduan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayats as $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $riwayat->tingkat_kecanduan}} ({{ $riwayat->value_cf*100 }}%)</td>
                                <td>{{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y')}}  </td>
                                <td style="width: 100px;">
                                    <a href="/dashboard/riwayat/{{ $riwayat->id }}" class="badge text-bg-success"><i class="uil uil-eye"></i></a>
                                    <form action="/dashboard/gejala/{{ $riwayat->id }}" method="post" class="d-inline">
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
            </div>
            <!-- Left Sidebar -->
            <div class="col-md-4 bg-light p-4 order-md-1 d-flex flex-column align-items-center">
                <img src="/img/Picture2.png" alt="Logo" class="mb-4" style="width: 150px;">
                <h2 class="text-primary text-start w-100">Cara Mengisi Kuisioner GamerLens</h2>
                <ol class="text-start w-100">
                    <li>Baca Pertanyaan dengan Saksama.</li>
                    <li>Jawab dengan Jujur.</li>
                    <li>Jawab Semua 14 Pertanyaan.</li>
                    <li>Periksa Kembali Jawaban Anda.</li>
                </ol>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
</body>

</html>
