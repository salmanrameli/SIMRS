@extends('layouttemplate::master')

@section('title')
    Tambah Alat Kesehatan Baru
@endsection

@section('content')
    <div class="card card-body">
        <h3>Tambah Alat Kesehatan Baru</h3>
        <br>
        {{ Form::open(['route' => 'alat_kesehatan.store']) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama Alat Kesehatan', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
            {{ Form::text('harga', null, ['class' => 'form-control']) }}
        </div>
        <br>
        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

        {{ Form::close() }}
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.alkes')
@endsection