@extends('saya::layouts.master')

@section('content')
    <div class="card card-body">
        <h3>Detail Akun: <b>{{ $user->nama }}</b></h3>

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ubah
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{ route('saya.edit', ['id' => $user->id]) }}">Ubah Akun</a>
                <a class="dropdown-item" href="{{ route('saya.edit_password', ['id' => $user->id]) }}">Ubah Password</a>
            </div>
        </div>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th class="w-25">ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->nama }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->alamat }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $user->telepon }}</td>
            </tr>
            <tr>
                <th>Hak Akses</th>
                <td>{{ $user->jabatan }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
