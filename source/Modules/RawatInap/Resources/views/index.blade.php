@extends('layouttemplate::master')

@section('title')
    Pasien Rawat Inap
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <br>
                <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary">Daftarkan Rawat Inap Baru</a>
                <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info" style="margin-left: 10px">Lihat Semua Pasien</a>
                <br>
                <br>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Nomor Kamar</th>
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
                                <td>{{ $pasien->dokter->nama }}</td>
                                <td>{{ date("d F Y", strtotime($pasien->tanggal_masuk)) }}</td>
                                <th>
                                    <div class="dropdown show">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilihan...
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('ranap.show', $pasien->id) }}" class="dropdown-item">Detail...</a>
                                            @if(Auth::user()->jabatan_id == 3)
                                                <a href="{{ route('perjalanan_penyakit.index', $pasien->pasien->id) }}" class="dropdown-item">Perjalanan Penyakit Pasien</a>
                                                <a href="{{ route('perintah_dokter_dan_pengobatan.index', $pasien->pasien->id) }}" class="dropdown-item">Perintah Dokter Dan Pengobatan</a>
                                                <a href="{{ route('catatan_harian_perawatan.index', $pasien->pasien->id) }}" class="dropdown-item">Catatan Harian dan Perawatan</a>
                                            @endif
                                        </div>
                                    </div>
                                </th>
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
