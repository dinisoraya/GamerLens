
<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Sistem Pakar</title>
  <!---Custom CSS File--->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/login-style.css">
  <style>
    .gagal-feedback {
    color: #dc3545; /* Red color for error messages */
    font-size: 0.875em; /* Smaller text for error messages */
    margin-top: 0.25rem; /* Spacing between input field and error message */
}
  </style>
</head>
<body>
  <div class="container">

    <div class="login form">

      <div class="row">
        {{-- <img src="{{ asset('img/logo.png') }}" alt="logo-kauman" style="max-width: 120px; max-height: auto; object-fit:cover; margin:0 auto;"> --}}
        <header>Daftar Sistem Pakar</header>
      </div>
      <form action="/signup" method="POST">
        @csrf
        @error('nama')
        <div class="gagal-feedback">
            {{$message}}
        </div> 
        @enderror
        <input type="text" name="nama" placeholder="nama" @error('nama') is-invalid @enderror" id="nama" required value="{{ old('nama') }}">
        @error('username')
        <div class="gagal-feedback">
            {{$message}}
        </div> 
        @enderror
        <input type="text" name="username" placeholder="username" @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
        @error('password')
        <div class="gagal-feedback">
            {{$message}}
        </div> 
        @enderror
        <input type="password" name="password" placeholder="password" required>
        @error('password')
        <div class="gagal-feedback">
            {{$message}}
        </div> 
        @enderror
        <input type="password" name="password_confirmation" placeholder="konfirmasi password" required>
        <button type="submit" class="btn btn-primary mt-3">Buat akun</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
