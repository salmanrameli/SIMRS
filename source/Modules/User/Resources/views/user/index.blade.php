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
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-info">Detail...</a>
                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('user.edit', ['id' => $user->id]) }}">Ubah</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end float-left">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection
