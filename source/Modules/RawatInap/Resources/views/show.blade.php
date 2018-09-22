@extends('layouttemplate::master')

@section('title')
    Detail Rawat Inap: {{ ucwords($ranap->pasien->nama) }}
    @endsection

@section('content')
    <div class="card">
        <div class="card-header">Rincian Rawat Inap</div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nomor Rekam Medis</th>
                        <td>{{ $ranap->id_rm }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td id="tgl_masuk" hidden>{{ $ranap->tanggal_masuk }}</td>
                        <td id="tanggal_masuk"></td>
                    </tr>
                    <tr>
                        <th>Dokter Pengirim</th>
                        <td>{{ ucwords($ranap->dokter_pengirim) }}</td>
                    </tr>
                    <tr>
                        <th>Petugas Penerima</th>
                        <td>{{ ucwords($ranap->petugas->nama) }}</td>
                    </tr>
                    <tr>
                        <th>Diagnosa Awal</th>
                        <td>{{ ucfirst($ranap->diagnosa_awal) }}</td>
                    </tr>
                    <tr>
                        <th>ICD X Diagnosa Awal</th>
                        <td>{{ ucfirst($ranap->icd_x_diagnosa_awal) }}</td>
                    </tr>
                    <tr>
                        <th>Dokter Penanggung Jawab</th>
                        <td>{{ ucwords($ranap->user->nama) }}</td>
                    </tr>
                    <tr>
                        <th>Diagnosa Sekunder</th>
                        <td>{{ ucfirst($ranap->diagnosa_sekunder) }}</td>
                    </tr>
                    <tr>
                        <th>ICD X Diagnosa Sekunder</th>
                        <td>{{ ucfirst($ranap->icd_x_diagnosa_sekunder) }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">Kamar</th>
                        <td>{{ $ranap->nama_kamar }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-none d-lg-block">
                <div class="btn-group">
                    @if($ranap->userCanAccess(Auth::user()))
                        <a href="{{ route('pasien.show', $ranap->pasien->id) }}" class="btn btn-outline-info">Rincian Pasien</a>
                    @endif

                    @if($ranap->userCanAccess(Auth::user()) && $ranap->userCanUpdate(Auth::user()))
                        <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('pasien.edit', $ranap->pasien->id) }}" class="dropdown-item">Ubah Data Pasien</a>
                        </div>
                    @endif
                </div>
                @if($ranap->userIsDokter(Auth::user()) || $ranap->userIsPerawat(Auth::user()))
                    <hr>
                    <div class="d-inline-flex">
                        <a href="{{ route('perjalanan_penyakit.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Perjalanan Penyakit Pasien</a>
                        <a href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->pasien->id) }}" class="btn btn-outline-info" style="margin-left: 5px; margin-right:5px">Perintah Dokter Dan Pengobatan</a>
                        <a href="{{ route('catatan_harian_perawatan.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Catatan Harian dan Perawatan</a>
                    </div>
                @endif

                @if($ranap->userCanAccess(Auth::user()) && $ranap->userCanUpdate(Auth::user()))
                    <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-warning float-right">Ubah</a>
                @endif
            </div>

            <div class="d-lg-none">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            @if($ranap->userCanAccess(Auth::user()))
                            <a href="{{ route('pasien.show', $ranap->pasien->id) }}" class="btn btn-outline-info" style="">Rincian Pasien</a>
                            @endif
                            @if($ranap->userCanUpdate(Auth::user()))
                            <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('pasien.edit', $ranap->pasien->id) }}" class="dropdown-item">Ubah Data Pasien</a>
                            </div>
                                @endif
                        </div>
                        @if($ranap->userCanUpdate(Auth::user()))
                        <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-warning btn-block">Ubah</a>
                            @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($ranap->userIsDokter(Auth::user()) || $ranap->userIsPerawat(Auth::user()))
                            <a href="{{ route('perjalanan_penyakit.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Perjalanan Penyakit Pasien</a>
                            <a href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Perintah Dokter Dan Pengobatan</a>
                            <a href="{{ route('catatan_harian_perawatan.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Catatan Harian dan Perawatan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Rincian Pembayaran</div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Estimasi Biaya</th>
                        <td>{{ $ranap->estimasi_biaya }}</td>
                    </tr>
                    <tr>
                        <th>Pembayaran</th>
                        <td>{{ ucwords($ranap->pembayaran) }}</td>
                    </tr>
                    @if($ranap->pembayaran != 'bayar sendiri')
                        <tr>
                            <th>Jaminan</th>
                            <td>{{ $ranap->jaminan }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Nama Penanggung Jawab Pembayaran</th>
                        <td>{{ ucwords($ranap->nama_penanggungjawab_pembayaran) . " (" . ucwords($ranap->hubungan_penanggungjawab) . ")"}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Penanggung Jawab Pembayaran</th>
                        <td>{{ $ranap->alamat_penanggungjawab_pembayaran }}</td>
                    </tr>
                    <tr>
                        <th>Telepon Penanggung Jawab Pembayaran</th>
                        <td>{{ $ranap->telepon_penanggungjawab_pembayaran }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('script')
    @include('rawatinap::attribute.nav')
    @endsection