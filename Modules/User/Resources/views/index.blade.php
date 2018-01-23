@extends('user::layouts.master')

@section('content')
    <div class="col-12">
        <h1>Hello World</h1>
        <p>This view is loaded from module: {!! config('user.name') !!}</p>
        <a class="btn btn-outline-primary" href="{{ route('user.create') }}">Buat User Baru</a>
        <br><br>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Jabatan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->telepon }}</td>
                    <td>{{ $user->jabatan }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
