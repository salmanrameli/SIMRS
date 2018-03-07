@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Administrasi Rawat Inap Pasien <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary" style="margin-left: 10px">Rawat Inap Baru</a></h4>
                    <br>
                </div>
                <div style="max-height: 600px; overflow: auto">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Nomor Kamar</th>
                            <th>Dokter Penanggung Jawab</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $pasien->pasien->nama }}</td>
                                <td>{{ $pasien->nama_kamar }}</td>
                                <td>{{ $pasien->dokter->nama }}</td>
                                <td>{{ $pasien->tanggal_masuk }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection