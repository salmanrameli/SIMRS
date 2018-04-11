@extends('layouttemplate::master')

@section('title')
    Perjalanan Penyakit Pasien
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs small">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Perjalanan Penyakit</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="float-right"><a href="{{ route('perjalanan_penyakit.create', $pasien->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                        <h4>Perjalanan Penyakit: {{ $pasien->nama }}</h4>
                        <hr>
                        <div class="col-md-12">
                            <table>
                                <tbody class="small">
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td style="padding-left: 10px">: {{ ucfirst($pasien->jenkel) }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td id="umur" style="padding-left: 10px"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td style="padding-left: 10px">: {{ date("d F Y", strtotime($tanggal_masuk)) }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="small">
                            <tr>
                                <th>Tanggal</th>
                                <th>Perjalanan Penyakit</th>
                                <th>Perintah Dokter dan Pengobatan</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                        @foreach($perjalanans as $perjalanan)
                            <tr>
                                <td>{{ date("d F Y", strtotime($perjalanan->tanggal_keterangan)) }}</td>
                                <td>
                                    <label><b>Subjektif</b></label>
                                    <p>{{ $perjalanan->subjektif }}</p>
                                    <label><b>Objektif</b></label>
                                    <p>{{ $perjalanan->objektif }}</p>
                                    <label><b>Assessment</b></label>
                                    <p>{{ $perjalanan->assessment }}</p>
                                </td>
                                <td>{{ $perjalanan->planning_perintah_dokter_dan_pengobatan }}</td>
                            </tr>
                        @endforeach
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
