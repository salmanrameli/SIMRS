<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('js/jHtmlArea-0.8.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/datepicker-id.js') }}"></script>
        <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jHtmlArea.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    @include('layouttemplate::navbar')
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    @include('layouttemplate::alert')

                    <div class="wrapper">
                        <div class="d-none d-lg-block">
                            <nav id="sidebar">
                                <ul class="list-unstyled components" id="nav-elements">
                                    @include('layouttemplate::sidebar')
                                </ul>
                            </nav>
                        </div>

                        <div id="content">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-header">
                                            <div class="row">
                                                {{--<div class="d-none d-md-block d-lg-none">--}}
                                                    {{--<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary" style="margin-right: 20px"><i class="fas fa-align-left"></i></button>--}}
                                                {{--</div>--}}

                                                {{--<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary" style="margin-right: 20px"><i class="fas fa-align-left"></i></button>--}}

                                                <h3>@yield('title')</h3>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @yield('content')

                            @yield('modal')
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @yield('script')
        <script>
            $('#nav-elements').on('click', 'li', function() {
                $('#nav-elements li.active').removeClass('active');
            });
        </script>
        <script>
            $( function() {
                $('#datepicker').datepicker( $.datepicker.regional[ "id" ] );
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <script>
            var date = new Date($('#tgl_masuk').text());
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            $('#tanggal_masuk').append(" " + date.toLocaleDateString('id', options));
        </script>
    </body>
    <footer class="d-none" style="padding-bottom: 2%"></footer>
</html>
