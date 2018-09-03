@extends('layouttemplate::master')

@section('title')
    Welcome
    @endsection

@section('content')
    <hr>
    <div class="page-header">
        <h4>Berikut adalah modul yang dapat diakses:</h4>
        <br>
    </div>
    <div class="row">
        @foreach($moduls as $modul)
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="col-md-12">
                        <b>{{ ucwords($modul->nama_modul) }}</b>
                        <a href="{{ route($modul->rute_home) }}" class="btn btn-outline-info float-right">Masuk</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    {{--<p>--}}
        {{--This view is loaded from module: {!! config('login.name') !!}<br>--}}
    {{--</p>--}}
@stop
