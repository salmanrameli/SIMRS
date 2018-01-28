@extends('user::layouts.master')

@section('content')
<div class="card card-body">
    <h3>Registrasi Akun Baru</h3>
    <br>
    {{ Form::open(['route' => 'user.store']) }}

    <div class="form-group">
        {{ Form::label('id', 'ID', ['class' => 'control-label']) }}
        {{ Form::text('id', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('nama', 'Nama', ['class' => 'control-label']) }}
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

    <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('jabatan', 'Jabatan', ['class' => 'control-label']) }}
        <br>
        {{ Form::radio('jabatan', 'administrator') }} &nbsp; Administrator<br>
        {{ Form::radio('jabatan', 'petugas') }} &nbsp; Petugas Rawat Inap<br>
        {{ Form::radio('jabatan', 'kasir') }} &nbsp; Kasir<br>
    </div>
    <br>
    {{ Form::submit('Buat Akun', ['class' => 'btn btn-outline-success']) }}

    {{ Form::close() }}
</div>
    @endsection