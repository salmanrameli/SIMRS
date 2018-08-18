@extends('layouttemplate::master')

@section('title')
    Rincian Dokter
    @endsection

@section('content')
    <div class="card card-body">
        <h3>{{ ucfirst($dokter->nama) }}</h3>
        <br>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $dokter->id }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $dokter->telepon }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $dokter->alamat }}</td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12">
            <div class="row">
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning float-left">Ubah Data</a>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection