@extends('layouttemplate::master')

@section('title')
    Pasien Rawat Inap
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>Daftar Pasien Rawat Inap</h3>
                </div>

                @if(Auth::user()->jabatan_id == 2)
                	<hr>
                    <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                    <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary">Daftarkan Rawat Inap Baru</a>
	                <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info" style="margin-left: 10px">Lihat Semua Pasien</a>
	                <br>
                	<br>
                @endif
                
                <div style="min-height: 60vh;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Nomor Kamar</th>
                                <th>Diagnosa Awal</th>
                                <th>Dokter Penanggung Jawab</th>
                                <th>Tanggal Masuk</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $pasien->pasien->nama }}</td>
                                <td>{{ $pasien->nama_kamar }}</td>
                                <td>{{ $pasien->diagnosa_awal }}</td>
                                <td>{{ $pasien->user->nama }}</td>
                                <td>{{ date("d F Y", strtotime($pasien->tanggal_masuk)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('ranap.show', $pasien->id) }}" class="btn btn-outline-info">Detail...</a>
                                        <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            @if(Auth::user()->jabatan_id == 2)
                                                <a href="{{ route('ranap.edit', $pasien->id) }}" class="dropdown-item">Ubah</a>
                                            @else
                                                <a href="{{ route('perjalanan_penyakit.index', $pasien->pasien->id) }}" class="dropdown-item">Perjalanan Penyakit Pasien</a>

                                                @if(Auth::user()->jabatan_id == 4)
                                                    <a href="{{ route('perjalanan_penyakit.create', $pasien->pasien->id) }}" class="dropdown-item">Buat Catatan Perjalanan Penyakit Baru</a>
                                                @endif
                                                <div class="dropdown-divider"></div>

                                                <a href="{{ route('perintah_dokter_dan_pengobatan.index', $pasien->pasien->id) }}" class="dropdown-item">Perintah Dokter Dan Pengobatan</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('catatan_harian_perawatan.index', $pasien->pasien->id) }}" class="dropdown-item">Catatan Harian dan Perawatan</a>

                                                @if(Auth::user()->jabatan_id == 3)
                                                    <a href="{{ route('catatan_harian_perawatan.create', $pasien->pasien->id) }}" class="dropdown-item">Buat Catatan Harian dan Perawatan Baru</a>
                                                @endif

                                            @endif
                                        </div>
                                    </div>
                                </td>
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
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
