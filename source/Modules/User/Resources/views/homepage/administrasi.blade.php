@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
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