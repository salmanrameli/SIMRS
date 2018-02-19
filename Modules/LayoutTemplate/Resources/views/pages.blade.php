<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
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
                        @include('layouttemplate::sidebar')
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand"><h3>@yield('title')</h3></a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <a href="{{ route('setting.index') }}" class="btn btn-outline-info float-right" style="margin-right: 10px">Pengaturan Akun</a>
                            </form>
                            <form class="form-inline my-2 my-lg-0">
                                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </form>
                        </div>
                    </nav>
                    <div class="col-md-12">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        @include('layouttemplate::alert')

                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        @yield('script')
    </body>
    <footer style="padding-bottom: 5%"></footer>
</html>
