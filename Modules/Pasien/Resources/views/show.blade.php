@extends('pasien::layouts.master')

@section('content')
    <div class="card card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th class="w-25">ID</th>
                    <td>{{ $pasien->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $pasien->nama }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $pasien->jenkel }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $pasien->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Golongan Darah</th>
                    <td>{{ $pasien->golongan_darah }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $pasien->alamat }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $pasien->telepon }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection