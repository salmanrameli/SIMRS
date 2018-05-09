@extends('layouttemplate::master')

@section('title')
    Ubah Detail Alat Kesehatan
@endsection

@section('content')
    <div class="card card-body">
        {{ Form::model($alkes, ['method' => 'PATCH', 'route' => ['alat_kesehatan.update', 'id' => $alkes->id]]) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
            {{ Form::text('harga', null, ['class' => 'form-control']) }}
        </div>

        <br>

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.alkes')
@endsection