@extends('layouttemplate::pages')

@section('content')
    <div class="col-md-12">
        <div class="card card-body">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#pasien" role="tab">Daftar Pasien Rawat Inap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#denah" role="tab">Denah Ruangan</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="pasien" role="tabpanel">
                    <div class="col-md-12">
                        <br>
                        <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                        <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary" style="margin-left: 10px">Daftarkan Rawat Inap Baru</a>
                        <br>
                        <br>
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
                                        <th><a href="{{ route('ranap.show', $pasien->id) }}" class="btn btn-outline-info btn-sm float-right">Detail...</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info">Lihat Semua Pasien</a>
                    </div>
                </div>

                <div class="tab-pane" id="denah" role="tabpanel">
                    <div class="col-md-12">
                        <br>
                        <div class="col-md-12">
                            @foreach($lantais as $lantai)
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lantai {{ $lantai }}</h5>
                                    </div>
                                    <div class="card-body">
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
                                                            <a href="{{ route('ranap.kamar.show', $kamar->nama_kamar) }}" class="btn btn-outline-info btn-sm">Detail...</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection