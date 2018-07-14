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
    <body style="background-image: url({{ asset('img/grey.png') }})">
    <div class="container-fluid" style="padding: 1% 20px 1% 20px; background-color: white; margin-bottom: 5px; border-bottom: 2px solid whitesmoke;">
        <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <a href="{{ route('setting.index') }}" class="btn btn-outline-info float-right" style="margin-right: 10px">Pengaturan Akun</a>
        <h4>Sistem Informasi Manajemen Rumah Sakit | <small style="font-size: 17px">{{ \Illuminate\Support\Facades\Auth::user()->nama }}</small></h4>
    </div>
        <div class="container-fluid" style="padding-top: 15px">
            <div class="col-md-12">
                <div class="row">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="tab-content">
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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs small">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('ranap.index') }}"><i class="fa fa-home"></i> Beranda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}" id="perjalanan_penyakit">Perjalanan Penyakit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}" id="perintah_dokter">Perintah Dokter dan Pengobatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}" id="catatan_harian">Catatan Harian dan Perawatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('konsumsi_obat.index', $ranap->id) }}" id="konsumsi_obat">Konsumsi Obat</a>
                                        </li>
                                    </ul>
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
    {{--<footer style="padding-bottom: 2%"></footer>--}}
</html>
