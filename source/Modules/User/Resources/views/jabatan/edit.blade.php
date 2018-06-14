@extends('layouttemplate::master')

@section('title')
    Ubah Jabatan
    @endsection

@section('content')
    <div class="card card-body">
        {{ Form::model($jabatan, ['method' => 'PATCH', 'route' => ['jabatan.update', $jabatan->id]]) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama Jabatan', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection