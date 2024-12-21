<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>GamerLens</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery and jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- MDB -->
  <link rel="stylesheet" href="css/bootstrap-login-form.min.css" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .img-fluid {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">GamerLens</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ asset('/#hero') }}" class="active">Home<br></a></li>
          <li><a href="{{ asset('/#about') }}">About</a></li>
          <a class="btn-getstarted flex-md-shrink-0" href="/login">Login</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

     

    </div>
  </header>
@if (session()->has('loginError') || Cookie::has('loginLimit'))
    <div class="alert alert-danger alert-dismissible fade show col-sm-12" role="alert" style="z-index: 9999;">
      {{ session('loginError') }} 
      {{ Cookie::get('loginLimit') }} 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  <!-- Start your project here-->
  <section class="hero" style="background-color: #ffff; padding-top:0px;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img
                  src="img/login.jpg"
                  alt="login form"
                  class="img-fluid" style="border-radius: 1rem 0 0 1rem; "
                />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form action="/signup" method="POST" id="myForm">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">GamerLens</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up into your account</h5>
                      @error('nama')
                        <div class="gagal-feedback text-danger">
                            {{$message}}
                        </div> 
                      @enderror
                    <div class="form-outline mb-4">
                      <input type="text" name="nama" @error('nama') is-invalid @enderror" id="nama" required value="{{ old('nama') }}" class="form-control form-control-lg" />
                      <label class="form-label" for="username">Nama Lengkap</label>
                      
                    </div>
                    @error('username')
                    <div class="gagal-feedback text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                    <div class="form-outline mb-4">
                      <input type="text" name="username" placeholder="username" @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}" class="form-control form-control-lg" />
                      <label class="form-label" for="username">Username</label>
                    </div>
                    @error('jenis_kelamin')
                    <div class="gagal-feedback text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                    <div class="mb-4" style="color: rgba(0,0,0,.6);">
                      <select class="form-select" aria-label="Default select example"style="color: rgba(0,0,0,.6); border: 1px solid rgb(33, 37, 41, .4);" name="jenis_kelamin">
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>

                    @error('umur')
                    <div class="gagal-feedback text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                    <div class="form-outline mb-4">
                      {{-- <input type="text" id="datepicker" name="umur" value="{{ old('umur') }}" class="form-control form-control-lg" /> --}}
                      <input type="date" name="tanggal_lahir" class="form-control form-control-lg" min="1999-01-01" max="2012-01-01" placeholder="dd-mm-yyyy">
                      <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    </div>

                    @error('password')
                    <div class="gagal-feedback text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                    @error('password')
                    <div class="gagal-feedback text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                    <div class="form-outline mb-4">
                      <input type="password" name="password_confirmation" required class="form-control form-control-lg" />
                      <label class="form-label" for="password">Konfirmasi Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Sign Up</button>
                    </div>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
        // Ambil elemen form dengan id 'myForm'
        const form = document.getElementById('myForm');

        // Tambahkan event listener 'submit' ke form
        form.addEventListener('submit', function(event) {
            // Ambil elemen input dengan id 'umur'
            const umurInput = document.getElementById('umur');

            // Ambil nilai umur dari elemen input
            const umur = umurInput.value;

            // Cek apakah umur lebih dari 25 atau kurang dari 10
            if (umur > 25 || umur < 10) {
                // Mencegah pengiriman form
                event.preventDefault();

                // Tampilkan konfirmasi menggunakan SweetAlert
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Sistem pakar ini diperuntukan untuk umur antara 10 dan 25 tahun. Apakah Anda yakin ingin melanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan 'OK', kirim form secara manual
                        form.submit();
                    }
                });
            }
        });

</script>
<script src="assets/js/main.js"></script>
{{-- <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd',
            value: '{{ now()->format('Y-m-d') }}'
        });
</script> --}}
</body>

</html>