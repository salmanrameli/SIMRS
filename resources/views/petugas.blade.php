@extends('layouts.master')

@section('greetings')
    <p class="lead">Selamat datang kembali, <b>{{ $nama }}</b></p>
@endsection

@section('content')
    <div class="col-4">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/cog.png') }}" alt="Users">
            <div class="card-body">
                <h5 class="card-title">Pengaturan Akun</h5>
                <p class="card-text"></p>
                <a href="" class="btn btn-outline-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection()