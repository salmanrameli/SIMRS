@extends('layouttemplate::master')

@section('title')
    Detail Akun: {{ $user->nama }}
@endsection

@section('content')
    <div class="card card-body">
        <div class="d-none d-sm-block">
            &nbsp;<a class="btn btn-warning" href="{{ route('setting.edit', ['id' => $user->id]) }}">Ubah Akun</a>
            <a class="btn btn-warning" href="{{ route('setting.edit_password', ['id' => $user->id]) }}" style="margin-left: 10px">Ubah Password</a>
        </div>

        <div class="d-sm-none">
            <a class="btn btn-warning btn-block" href="{{ route('setting.edit', ['id' => $user->id]) }}">Ubah Akun</a>
            <a class="btn btn-warning btn-block" href="{{ route('setting.edit_password', ['id' => $user->id]) }}">Ubah Password</a>
        </div>
        <hr>
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
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
                        <td>{{ ucfirst($user->jabatan->nama ) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection