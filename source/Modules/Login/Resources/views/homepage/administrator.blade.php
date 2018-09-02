@extends('layouttemplate::master')

@section('title')
    Administrator Dashboard
    @endsection

@section('content')
    <div class="row">
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
                <img class="img-fluid mx-auto" src="{{ asset('img/doctor.png') }}" alt="Dokter">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Dokter RS</h5>
                    <p class="card-text">Mengelola data dokter rumah sakit, seperti mendaftarkan dokter, merubah, atau menghapus data dokter yang terdaftar di rumah sakit.</p>
                    <a href="{{ route('dokter.index') }}" class="btn btn-outline-primary">Masuk</a>
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
                    <p class="card-text">Mengelola lantai dan kamar dalam rumah sakit.</p>
                    <a href="{{ route('bangunan.index') }}" class="btn btn-outline-primary">Masuk</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
