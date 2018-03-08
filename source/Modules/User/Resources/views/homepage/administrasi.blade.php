@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
        <div class="page-header">
            <h4>Detail Ruangan</h4>
        </div>
        <div class="col-md-12">
            @foreach($lantais as $lantai)
                <div class="row align-items-center justify-content-center">
                    <div class="card card-body">
                        <h5>
                            Lantai {{ $lantai }}
                        </h5>
                        <div class="row">
                            @foreach($kamars as $kamar)
                                @if($kamar->nomor_lantai == $lantai)
                                    <div class="col-md-2">
                                        <div class="card card-body">
                                            <h6 class="text-center">Kamar {{ $kamar->nama_kamar }}</h6>
                                            <table class="table">
                                                <tbody class="small">
                                                <tr>
                                                    <th>Kapasitas</th>
                                                    <td>{{ $kamar->jumlah_maks_pasien }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Terisi</th>
                                                    @foreach($terisis as $terisi)
                                                        @if($terisi->nama_kamar == $kamar->nama_kamar)
                                                            <td>{{ $terisi->pasien_inap }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Administrasi Rawat Inap Pasien <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary" style="margin-left: 10px">Rawat Inap Baru</a></h4>
                    <br>
                </div>
                <div style="max-height: 500px; overflow: auto">
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
                                <td>{{ $pasien->tanggal_masuk }}</td>
                                <th><a href="{{ route('ranap.show', $pasien->id) }}" class="btn btn-outline-info btn-sm float-right">Lihat</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection