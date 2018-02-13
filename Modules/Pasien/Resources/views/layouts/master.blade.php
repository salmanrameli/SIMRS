<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Manajemen Data Pasien</title>

        <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
    </head>
    <body style="background-color: #f8f9fa">
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        {{--<a href="/">Beranda</a>--}}
                    </li>
                    <li>
                        <a href="/">Beranda</a>
                        <a href="{{ route('user.index') }}">Manajemen Akun Staff</a>
                        <a class="sidebar-active" href="{{ route('pasien.index') }}">Manajemen Data Pasien</a>
                        <a href="">Pengaturan Rumah Sakit</a>
                        <a href="{{ route('setting.index') }}">Pengaturan Akun</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand"><h3>Manajemen Data Pasien</h3></a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </form>
                        </div>
                    </nav>
                    <div class="col-md-12">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        <div class="col-md-12">
                            @include('layouts.alert')
                        </div>

                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </body>
    <footer style="padding-bottom: 5%"></footer>
</html>
