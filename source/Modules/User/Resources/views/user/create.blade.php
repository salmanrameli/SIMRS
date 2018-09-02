@extends('layouttemplate::master')

@section('title')
    Registrasi Akun Staff Baru
@endsection

@section('content')
    <div class="card card-body">
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
            <select class="form-control" name="jabatan_id">
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}" id="jabatan_id" name="{{ $jabatan->id }}">{{ ucfirst($jabatan->nama) }}</option>
                @endforeach
            </select>
        </div>

        <br>

        {{ Form::submit('Buat Akun', ['class' => 'btn btn-outline-success float-right']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('user::attribute.nav')
@endsection