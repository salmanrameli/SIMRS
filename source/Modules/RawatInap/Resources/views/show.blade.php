@extends('layouttemplate::master')

@section('title')
    Detail Rawat Inap: {{ ucwords($ranap->pasien->nama) }}
    @endsection

@section('content')
    <div class="card card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Nomor Rekam Medis</th>
                    <td>{{ $ranap->id_rm }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
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

        <div class="d-none d-md-block">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('pasien.show', $ranap->pasien->id) }}" class="btn btn-outline-info">Rincian Pasien</a>
                    @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                        <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('pasien.edit', $ranap->pasien->id) }}" class="dropdown-item">Ubah Data Pasien</a>
                        </div>
                    @endif
                </div>

                @if(Auth::user()->jabatan_id == 3 || Auth::user()->jabatan_id == 4)
                    <a href="{{ route('perjalanan_penyakit.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Perjalanan Penyakit Pasien</a>
                    <a href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Perintah Dokter Dan Pengobatan</a>
                    <a href="{{ route('catatan_harian_perawatan.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Catatan Harian dan Perawatan</a>
                @endif

                @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                    <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-warning float-right">Ubah</a>
                @endif
            </div>
        </div>

        <div class="d-md-none">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <a href="{{ route('pasien.show', $ranap->pasien->id) }}" class="btn btn-outline-info" style="">Rincian Pasien</a>
                        @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                            <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('pasien.edit', $ranap->pasien->id) }}" class="dropdown-item">Ubah Data Pasien</a>
                            </div>
                        @endif
                    </div>
                    @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                        <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-warning float-right">Ubah</a>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                @if(Auth::user()->jabatan_id == 3 || Auth::user()->jabatan_id == 4)
                    <a href="{{ route('perjalanan_penyakit.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Perjalanan Penyakit Pasien</a>
                    <a href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Perintah Dokter Dan Pengobatan</a>
                    <a href="{{ route('catatan_harian_perawatan.index', $ranap->pasien->id) }}" class="btn btn-block btn-outline-info">Catatan Harian dan Perawatan</a>
                @endif
            </div>
        </div>

    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
    @endsection