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

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/fontawesome-all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vertical-tabs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jHtmlArea.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div class="col-md-12">
            <div class="container-fluid" style="padding: 1.5% 10px 1.5% 10px">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <a href="{{ route('setting.index') }}" class="btn btn-outline-info float-right" style="margin-right: 10px">Pengaturan Akun</a>
                <h4>Sistem Informasi Manajemen Rumah Sakit | <small style="font-size: 17px">{{ \Illuminate\Support\Facades\Auth::user()->nama }}</small></h4>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="d-flex">
                        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                            @include('layouttemplate::sidebar')
                        </ul>
                        <div class="tab-content">
                            <div class="row pre-scrollable" style="padding: 10px 25px 0 10px; max-height: 82vh; min-width: 100%">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="w-100 hidden"></th>
                                            <td class="w-100 hidden"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-md-12">
                                    @include('layouttemplate::alert')
                                </div>

                                @yield('content')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @yield('script')
    </body>
    <footer style="padding-bottom: 2%"></footer>
</html>
