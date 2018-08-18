@extends('layouttemplate::master')

@section('title')
    Registrasi Dokter Baru
    @endsection

@section('content')
    <div class="card card-body">
        {{ Form::open(['route' => 'dokter.store']) }}

        <div class="form-group">
            {{ Form::label('id_user', 'ID Dokter', ['class' => 'control-label']) }}
            {{ Form::text('id_user', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama', 'Nama Dokter', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat', ['class' => 'control-label']) }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('telepon', 'Telepon', ['class' => 'control-label']) }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>

        <br>

        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
@endsection