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
        <link rel="stylesheet" href="{{ asset('css/vertical-tabs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jHtmlArea.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    @include('layouttemplate::navbar')
    <body>
        <div class="container-fluid" style="padding-top: 15px">
            <div class="row">
                <div class="col-md-12">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    @include('layouttemplate::alert')

                    <div>
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
                            @yield('content')
                        </div>
                    </div>

                    @yield('modal')
                </div>
            </div>
        </div>
        @yield('script')
        <script>
            $( function() {
                $('#datepicker').datepicker( $.datepicker.regional[ "id" ]);
            });
        </script>
        <script>
            var lahir = new Date($('#tanggal_lahir').text());
            var sekarang = new Date();
            var tahun_sekarang = sekarang.getFullYear();
            var tahun_lahir = lahir.getFullYear();
            var umur = tahun_sekarang - tahun_lahir;
            $('#umur').append(": " + umur + " Tahun");
        </script>
        <script>
            var date = new Date($('#tgl_masuk').text());
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            $('#tanggal_masuk').append(" " + date.toLocaleDateString('id', options));

            var date_mobile = new Date($('#tgl_masuk_mobile').text());
            var options_mobile = { year: 'numeric', month: 'long', day: 'numeric' };
            $('#tanggal_masuk_mobile').append(" " + date_mobile.toLocaleDateString('id', options_mobile));
        </script>

    </body>
</html>
