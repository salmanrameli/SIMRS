@extends('layouts.master')

@section('content')
    <div class="col-4">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/users.png') }}" alt="Users">
            <div class="card-body">
                <h5 class="card-title">Manajemen Akun Staff</h5>
                <p class="card-text">Menambah, merubah, menghapus akun staff Rumah Sakit.</p>
                <a href="{{ route('user.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/hospital.png') }}" alt="Users">
            <div class="card-body">
                <h5 class="card-title">Manajemen Rumah Sakit</h5>
                <p class="card-text"></p>
                <a href="" class="btn btn-outline-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <img class="img-fluid mx-auto" src="{{ asset('img/cog.png') }}" alt="Users">
            <div class="card-body">
                <h5 class="card-title">Pengaturan Akun</h5>
                <p class="card-text">Melihat serta melakukan perubahan detail akun</p>
                <a href="{{ route('saya.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>
    @endsection()