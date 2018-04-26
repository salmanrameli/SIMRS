@extends('layouttemplate::master')

@section('title')
    Registrasi Akun
@endsection

@section('content')
<div class="card card-body">
    <h3>Registrasi Akun Baru</h3>
    <br>
    {{ Form::open(['route' => 'user.store']) }}

    <div class="form-group">
        {{ Form::label('id_user', 'ID', ['class' => 'control-label']) }}
        {{ Form::text('id_user', null, ['class' => 'form-control']) }}
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
        {{ Form::label('jabatan_id', 'Jabatan', ['class' => 'control-label']) }}
        <br>
        {{ Form::radio('jabatan_id', '1') }} &nbsp; Administrator<br>
        {{ Form::radio('jabatan_id', '2') }} &nbsp; Administrasi<br>
        {{ Form::radio('jabatan_id', '3') }} &nbsp; Perawat<br>
        {{ Form::radio('jabatan_id', '5') }} &nbsp; Kasir<br>
    </div>
    <br>
    {{ Form::submit('Buat Akun', ['class' => 'btn btn-outline-success']) }}

    {{ Form::close() }}
</div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection