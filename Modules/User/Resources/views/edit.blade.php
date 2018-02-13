@extends('layouttemplate::pages')

@section('title')
    Ubah Data Akun
@endsection

@section('content')
    <div class="card card-body">
        {{ Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', 'id' => $user->id]]) }}

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

        <label>Hak Akses</label>
        <div class="form-group">
            {{ Form::radio('jabatan', 'administrator') }}
            {{ Form::label('jabatan', 'Administrator', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('jabatan', 'petugas') }}
            {{ Form::label('jabatan', 'Petugas Rawat Inap', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('jabatan', 'kasir') }}
            {{ Form::label('jabatan', 'Kasir', ['class' => 'control-label']) }}
        </div>

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-primary']) }}
        {{ Form::close() }}
    </div>
    @endsection