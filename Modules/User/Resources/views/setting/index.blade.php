@extends('layouttemplate::pages')

@section('title')
    Detail Akun
@endsection

@section('content')
    <div class="card card-body">
        <h3>Detail Akun: <b>{{ $user->nama }}</b></h3>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-info" href="{{ route('setting.edit', ['id' => $user->id]) }}">Ubah Akun</a>
                <a class="btn btn-outline-info" href="{{ route('setting.edit_password', ['id' => $user->id]) }}">Ubah Password</a>
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
                <td>{{ ucfirst($user->jabatan->nama ) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.setting')
@endsection