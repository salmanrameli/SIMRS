@extends('layouttemplate::master')

@section('title')
    Pasien Rawat Inap
    @endsection

@section('content')
    <div class="card card-body" style="min-height: 50vh">
        @if(Auth::user()->jabatan_id == 2)
            <div class="d-none d-md-block">
                <div class="col-md-12">
                    <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                    <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary">Daftarkan Rawat Inap Baru</a>
                    <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info" style="margin-left: 10px">Lihat Semua Pasien</a>
                </div>
            </div>

            <div class="d-md-none">
                <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary btn-block">Daftarkan Pasien Baru</a>
                <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary btn-block">Daftarkan Rawat Inap Baru</a>
                <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info btn-block">Lihat Semua Pasien</a>
            </div>
            <br>
        @endif
        <table class="table table-striped">
            <thead>
                <tr style="border-top: solid 1px #d8dbdd; border-bottom: solid 1px #d8dbdd">
                    <th>Nama Pasien</th>
                    <th class="d-none d-md-table-cell">Nomor Kamar</th>
                    <th class="d-none d-md-table-cell">Diagnosa Awal</th>
                    <th>DPJP</th>
                    <th class="d-none d-md-table-cell">Tanggal Masuk</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($ranaps as $ranap)
                <tr>
                    <td>{{ ucwords($ranap->pasien->nama) }}</td>
                    <td class="d-none d-md-table-cell">{{ $ranap->nama_kamar }}</td>
                    <td class="d-none d-md-table-cell">{{ ucfirst($ranap->diagnosa_awal) }}</td>
                    <td>{{ ucwords($ranap->user->nama) }}</td>
                    <td id="tgl_masuk" hidden>{{ $ranap->tanggal_masuk }}</td>
                    <td class="d-none d-md-table-cell" id="tanggal_masuk"></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('ranap.show', $ranap->id) }}" class="btn btn-sm btn-outline-info">Detail...</a>
                            <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                @if(Auth::user()->jabatan_id == 2)
                                    <a href="{{ route('ranap.edit', $ranap->id) }}" class="dropdown-item">Ubah</a>
                                @else
                                    <a href="{{ route('perjalanan_penyakit.index', $ranap->id) }}" class="dropdown-item"><i class="fas fa-file-medical-alt"></i> Perjalanan Penyakit Pasien</a>

                                    @if(Auth::user()->jabatan_id == 4)
                                        <a href="{{ route('perjalanan_penyakit.create', $ranap->id) }}" class="dropdown-item">Buat Catatan Perjalanan Penyakit Baru</a>
                                    @endif
                                    <div class="dropdown-divider"></div>

                                    <a href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}" class="dropdown-item"><i class="fas fa-file-medical"></i> Perintah Dokter Dan Pengobatan</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}" class="dropdown-item"><i class="fas fa-notes-medical"></i> Catatan Harian dan Perawatan</a>

                                    @if(Auth::user()->jabatan_id == 3)
                                        <a href="{{ route('catatan_harian_perawatan.create', $ranap->id) }}" class="dropdown-item">Buat Catatan Harian dan Perawatan Baru</a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('konsumsi_obat.index', $ranap->id) }}" class="dropdown-item"><i class="fas fa-pills"></i> Konsumsi Obat</a>

                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('tensi.index', $ranap->id) }}" class="dropdown-item"><i class="fas fa-signature"></i> Tensi</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
