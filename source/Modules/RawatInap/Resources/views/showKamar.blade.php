@extends('layouttemplate::pages-alt')

@section('title')
    Detail Rawat Inap Kamar
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="page-header">
                <h3>Ruang {{ $kamar }}</h3>
                <br>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Dokter Penanggung Jawab</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $pasien)
                        <tr>
                            <td>{{ $pasien->pasien->nama }}</td>
                            <td>{{ $pasien->dokter->nama }}</td>
                            <td>{{ $pasien->tanggal_masuk }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection