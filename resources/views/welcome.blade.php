<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatih Beef - Selamat Datang</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-bold">Fatih Beef</span>
                </a>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content-header text-center mt-5">
                <h1>Selamat Datang di <b>Fatih Beef</b></h1>
                <p class="lead">Sistem Penjualan Daging Sapi Segar</p>
            </div>
            <div class="content text-center">
                <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="Logo" width="150">
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>

</html>