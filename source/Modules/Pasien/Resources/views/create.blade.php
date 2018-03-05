@extends('layouttemplate::pages')

@section('title')
    Registrasi Pasien
@endsection

@section('content')
    <div class="card card-body">
        {{ Form::open(['route' => 'pasien.store']) }}

        <div class="form-group">
            {{ Form::label('ktp', 'KTP Pasien', ['class' => 'control-label']) }}
            {{ Form::text('ktp', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama', 'Nama Pasien', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <label>Jenis Kelamin:</label>
        <div class="form-group">
            {{ Form::radio('jenkel', 'pria', true) }}
            {{ Form::label('jenkel', 'Pria', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('jenkel', 'wanita', ['class' => 'form-control']) }}
            {{ Form::label('jenkel', 'Wanita', ['class' => 'control-label']) }}
        </div>

        <div class="form-group">
            {{ Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']) }}
            {{ Form::date('tanggal_lahir', null, ['class' => 'form-control']) }}
        </div>

        <label>Golongan Darah</label>
        <div class="form-group">
            {{ Form::radio('golongan_darah', 'A', true) }}
            {{ Form::label('golongan_darah', 'A', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'B', ['class' => 'form-control']) }}
            {{ Form::label('golongan_darah', 'B', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'AB', ['class' => 'form-control']) }}
            {{ Form::label('golongan_darah', 'AB', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'O', ['class' => 'form-control']) }}
            {{ Form::label('golongan_darah', 'O', ['class' => 'control-label']) }}
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

        {{ Form::submit('Simpan Data Pasien', ['class' => 'btn btn-outline-success']) }}
        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien')
@endsection