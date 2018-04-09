@extends('layouttemplate::master')

@section('title')
    Manajemen Staff
@endsection

@section('content')
    <div class="page-header">
        <h3>Manajemen Staff & Jabatan</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" action="{{ route('user.cari') }}" method="get">
                            <label for="cari" class="control-label">Cari Staff: </label>
                            &nbsp;&nbsp;
                            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="col-md-12">
                    <a class="btn btn-outline-primary" href="{{ route('user.create') }}">Daftarkan Staff Baru</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Jabatan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id_user }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->telepon }}</td>
                                <td>{{ ucfirst($user->jabatan->nama ) }}</td>
                                <td><a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-info">Lihat</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end float-left">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div>
            </div>
            &nbsp;&nbsp;
            <div class="card card-body">
                <div class="col-md-12">
                    <a class="btn btn-outline-primary" href="{{ route('jabatan.create') }}">Buat Jabatan Baru</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama Jabatan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jabatans as $jabatan)
                            <tr>
                                <td>{{ ucfirst($jabatan->nama) }}</td>
                                <td>
                                    <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST" class="float-right" style="margin-left: 5px">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus jabatan ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-outline-warning float-right">Ubah</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection
