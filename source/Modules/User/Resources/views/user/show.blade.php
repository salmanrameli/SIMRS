@extends('layouttemplate::master')

@section('title')
    Data Akun
@endsection

@section('content')
    <div class="card card-body">
        <h3>{{ ucfirst($user->nama) }}</h3>
        <br>
        <table class="table">
            <tr>
                <th class="w-25">ID</th>
                <td>{{ $user->id_user }}</td>
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
                <td>{{ ucfirst($user->jabatan->nama) }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-outline-warning">Ubah Data Staff</a>
                    {{ Form::open(['route' => ['user.delete', $user->id], 'method' => 'delete']) }}
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px" onclick="return confirm('Apakah anda yakin menghapus data staff?')">Hapus</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection