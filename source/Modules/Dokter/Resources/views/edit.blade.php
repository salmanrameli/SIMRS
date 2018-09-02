@extends('layouttemplate::master')

@section('title')
    Ubah Data Dokter
    @endsection

@section('content')
    <div class="card card-body">
        {{ Form::model($dokter, ['method' => 'PATCH', 'route' => ['dokter.update', $dokter->id]]) }}

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

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('dokter::attribute.nav')
    @endsection