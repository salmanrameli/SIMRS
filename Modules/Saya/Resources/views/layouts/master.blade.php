<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Module User</title>

        <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    </head>
    <body>
        <div class="jumbotron" style="background-color: white">
            <div class="container-fluid">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <h2>Sistem Informasi Manajemen Rumah Sakit</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="col-md-12">
                        @include('layouts.alert')
                    </div>

                    <div class="col-md-3">
                        <div class="card card-body">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-light" href="/">Beranda</a>
                                <a class="list-group-item list-group-item-light" href="{{ route('user.index') }}">Manajemen Akun Staff</a>
                                <a class="list-group-item list-group-item-light">Pengaturan Rumah Sakit</a>
                                <a class="list-group-item list-group-item-primary" href="{{ route('saya.index') }}">Pengaturan Akun</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="card card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <footer style="padding-bottom: 5%"></footer>
</html>
