@extends('layouts.master')

@section('greetings')
    <p class="lead">Selamat datang kembali, <b>{{ $nama }}</b></p>
    @endsection

@section('content')
    <div class="col-md-3">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/users.png') }}" alt="Users">
            <div class="card-body">
                <h5 class="card-title">Manajemen Akun Staff</h5>
                <p class="card-text">Mengelola akun staff Rumah Sakit seperti membuat akun baru, atau merubah dan menghapus akun yang sudah ada.</p>
                <a href="{{ route('user.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/patient.png') }}" alt="Pasien">
            <div class="card-body">
                <h5 class="card-title">Manajemen Data Pasien</h5>
                <p class="card-text">Mengelola data pasien Rumah Sakit seperti mendaftarkan pasien baru, atau merubah dan menghapus data pasien yang sudah ada.</p>
                <a href="{{ route('pasien.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/hospital.png') }}" alt="Rumah Sakit">
            <div class="card-body">
                <h5 class="card-title">Manajemen Rumah Sakit</h5>
                <p class="card-text"></p>
                <a href="" class="btn btn-outline-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/cog.png') }}" alt="Setting">
            <div class="card-body">
                <h5 class="card-title">Pengaturan Akun</h5>
                <p class="card-text">Melihat serta melakukan perubahan detail akun.</p>
                <a href="{{ route('saya.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>
    @endsection()