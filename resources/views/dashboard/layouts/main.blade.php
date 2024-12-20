<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="/css/dashboard-style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- Data Table --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Sistem Pakar</title>
    <style>
        /* CSS untuk menghapus border ketika tombol diklik atau fokus */
        .dropdown-toggle:focus,
        .dropdown-toggle:active {
            outline: none; /* Menghapus outline */
            box-shadow: none; /* Menghapus shadow */
            border: none; /* Menghapus border */
        }
                /* CSS untuk membuat lebar item dropdown sama dengan tombol dropdown */
        .dropdown-menu {
            width: 100%; /* Membuat lebar dropdown menu sama dengan tombol */
        }

        .dropdown-item {
            width: 100%; /* Membuat lebar item dropdown sama dengan menu */
            box-sizing: border-box; /* Memastikan padding tidak mempengaruhi lebar total */
        }

        @media (max-width: 768px) {
            .user-name{
                display: none
            }
        }

        @media (max-width: 575.98px) {

        }

    </style>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 12px;
        }

        input[type="submit"] {
            /* width: 100px; */
            background-color: #4CAF50;
            color: white;
            margin-top:5px;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .diagnosa{
            font-size: 14px;
        }
    </style>
</head>
<body>
    @include('dashboard.layouts.sidebar')
    <section class="dashboard">
    @include('dashboard.layouts.header')
    
    @yield('container')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="/js/dashboard-script.js"></script>

    
    @include('dashboard.layouts.script')
</body>
</html>