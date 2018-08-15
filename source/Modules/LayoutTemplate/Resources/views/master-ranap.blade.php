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
        <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vertical-tabs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jHtmlArea.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <div class="d-block d-sm-none">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="/">SIMRS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @include('layouttemplate::sidebar-mobile')
                </ul>
            </div>
        </nav>
    </div>
    <body style="background-image: url({{ asset('img/grey.png') }})">
        <div class="d-none d-sm-block container-fluid" style="padding: 1% 20px 1% 20px; background-color: white; margin-bottom: 5px; border-bottom: 2px solid whitesmoke;">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <a href="{{ route('setting.index') }}" class="btn btn-outline-info float-right" style="margin-right: 10px"><i class="fa fa-cogs"></i> Pengaturan Akun</a>
            <h4>Sistem Informasi Manajemen Rumah Sakit | <small style="font-size: 17px">{{ \Illuminate\Support\Facades\Auth::user()->nama }}</small></h4>
        </div>
        <div class="container-fluid" style="padding-top: 15px">
            <div class="row">
                <div class="col-md-12">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="d-block d-sm-none">
                        @include('layouttemplate::alert')

                        <ul class="nav nav-tabs" style="border-bottom: none">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catatan Pasien</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}"><i class="fas fa-file-medical-alt"></i> Perjalanan Penyakit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}"><i class="fas fa-file-medical"></i> Perintah Dokter dan Pengobatan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}"><i class="fas fa-notes-medical"></i> Catatan Harian dan Perawatan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('konsumsi_obat.index', $ranap->id) }}"><i class="fas fa-pills"></i> Konsumsi Obat</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('tensi.index', $ranap->id) }}"><i class="fas fa-signature"></i> Tensi</a>
                                </div>
                            </li>
                        </ul>
                        <div class="card">
                            @yield('content-mobile')
                        </div>
                    </div>

                    <div class="d-none d-sm-block">
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
                                                <a class="nav-link" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}" id="perjalanan_penyakit"><i class="fas fa-file-medical-alt"></i> Perjalanan Penyakit</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}" id="perintah_dokter"><i class="fas fa-file-medical"></i> Perintah Dokter dan Pengobatan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}" id="catatan_harian"><i class="fas fa-notes-medical"></i> Catatan Harian dan Perawatan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{ route('konsumsi_obat.index', $ranap->id) }}" id="konsumsi_obat"><i class="fas fa-pills"></i> Konsumsi Obat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{ route('tensi.index', $ranap->id) }}" id="tensi"><i class="fas fa-signature"></i> Tensi</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('modal')
                </div>
            </div>
        </div>
        @yield('script')
        <script>
            var lahir = new Date($('#tanggal_lahir').text());
            var sekarang = new Date();
            var tahun_sekarang = sekarang.getFullYear();
            var tahun_lahir = lahir.getFullYear();
            var umur = tahun_sekarang - tahun_lahir;
            $('#umur').append(": " + umur + " Tahun");
        </script>
    </body>
</html>
