@extends('layouttemplate::master')

@section('title')
    Konsumsi Obat Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs small">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}">Perjalanan Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}">Perintah Dokter dan Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}">Catatan Harian dan Perawatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('konsumsi_obat.index', $ranap->id) }}">Konsumsi Obat</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">

                        <div class="float-right"><a href="{{ route('perjalanan_penyakit.create', $ranap->pasien->id) }}" class="btn btn-outline-primary">Buat Catatan Perjalanan Penyakit Baru</a></div>

                        <h4>Konsumsi Obat: {{ $ranap->pasien->nama }}</h4>
                        <hr>
                        <div class="col-md-12">
                            <table>
                                <tbody class="small">
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td style="padding-left: 10px">: {{ ucfirst($ranap->pasien->jenkel) }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td id="umur" style="padding-left: 10px"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td style="padding-left: 10px">: {{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
                                </tr>
                                <tr>
                                    <th>Diagnosa Awal</th>
                                    <td style="padding-left: 10px">: {{ ucfirst($ranap->diagnosa_awal) }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <p id="tanggal_lahir" hidden>{{ $ranap->pasien->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <table class="table table-striped small">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>
                            <td>

                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var lahir = new Date($('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#umur').append(": " + umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
