@extends('user::layouts.master')

@section('content')
    <div class="card card-body">
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
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->telepon }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td><a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-info">Lihat</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
