@extends('layouttemplate::pages-alt')

@section('title')
    Detail Rawat Inap
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Rawat Inap Pasien: {{ $ranap->pasien->nama }}</h4>
                    <br>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th class="w-25">Kamar</th>
                            <td>{{ $ranap->nama_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Dokter Penanggung Jawab</th>
                            <td>{{ $ranap->dokter->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>{{ $ranap->tanggal_masuk }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-outline-warning">Ubah</a>
            </div>
        </div>
    </div>
    @endsection