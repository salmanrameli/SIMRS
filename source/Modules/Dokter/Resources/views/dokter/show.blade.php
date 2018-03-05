@extends('layouttemplate::pages')

@section('title')
    Detail Dokter
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Dokter: {{ $dokter->nama }}</h2>
                </div>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $dokter->id_dokter }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $dokter->telepon }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dokter->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Spesialis</th>
                            <td>{{ $dokter->bidang_spesialis }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-outline-warning float-left">Ubah Data</a>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection