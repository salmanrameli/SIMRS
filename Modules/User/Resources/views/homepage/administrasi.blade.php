@extends('layouttemplate::master')

@section('content')
    <div class="col-md-3">
        <div class="card">
            {{--<img class="img-fluid mx-auto" src="{{ asset('img/users.png') }}" alt="Users">--}}
            <div class="card-body">
                <h5 class="card-title">Administrasi Rawat Inap Pasien</h5>
                <p class="card-text"></p>
                <a href="{{ route('ranap.index') }}" class="btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </div>
@endsection