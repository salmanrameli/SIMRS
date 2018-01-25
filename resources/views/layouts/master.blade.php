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
        {{--<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">--}}

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div class="jumbotron" style="background-color: white">
            <div class="container-fluid">
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
                        @include('layouts.alert')
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </body>
    <footer style="padding-bottom: 5%"></footer>
</html>
