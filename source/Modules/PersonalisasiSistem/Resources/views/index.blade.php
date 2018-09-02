@extends('layouttemplate::master')

@section('title')
    Personalisasi Sistem
    @endsection

@section('content')
    <div class="card card-body">
        <div class="page-header">
            <h4>Ganti logo sistem</h4>
            <hr>
        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'personalisasi.ganti_logo', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('logo', 'Gunakan gambar berukuran persegi dengan tipe JPG/PNG', ['class' => 'control-label', 'style' => 'color: red']) !!}
            <br>
            {!! Form::file('logo', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Upload Logo', ['class' => 'btn btn-outline-success']) !!}

        {!! Form::close() !!}

        <br>
        <hr>

        <div class="page-header">
            <h4>Ganti nama Rumah Sakit</h4>
            <hr>
        </div>

        {{ Form::open(['method' => 'POST', 'route' => 'personalisasi.ganti_nama']) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama Rumah Sakit', ['class' => 'control-label']) }}
            {{ Form::text('nama', $nama, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Simpan Nama', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
@stop

@section('script')
    @include('personalisasisistem::attribute.nav')
    @endsection
