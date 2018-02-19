<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beranda</title>

        <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/fontawesome-all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div class="col-md-12">
            <div class="container-fluid" style="padding: 1.5% 10px 1.5% 10px">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <h2>Sistem Informasi Manajemen Rumah Sakit</h2>
                @yield('greetings')
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="col-md-12">
                        @include('layouttemplate::alert')
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </body>
    <footer style="padding-bottom: 5%"></footer>
</html>
