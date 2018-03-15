@extends('layouttemplate::pages')

@section('title')
    Detail Akun
@endsection

@section('content')
    <div class="container-fluid col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3>Detail Akun: <b>{{ $user->nama }}</b></h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-outline-warning" href="{{ route('setting.edit', ['id' => $user->id]) }}">Ubah Akun</a>
                            <a class="btn btn-outline-warning" href="{{ route('setting.edit_password', ['id' => $user->id]) }}">Ubah Password</a>
                        </div>
                    </div>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="padding-right: 100px">ID</th>
                                <td class="w-100" style="padding-left: 70px">{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td style="padding-left: 70px">{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td style="padding-left: 70px">{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td style="padding-left: 70px">{{ $user->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Hak Akses</th>
                                <td style="padding-left: 70px">{{ ucfirst($user->jabatan->nama ) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.setting')
@endsection