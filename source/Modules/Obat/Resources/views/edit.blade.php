@extends('layouttemplate::master')

@section('title')
    Ubah Detail Obat
    @endsection

@section('content')
    <div class="card card-body">
        {{ Form::model($obat, ['method' => 'PATCH', 'route' => ['obat.update', 'id' => $obat->id]]) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
            {{ Form::text('harga', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
            {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], $obat->tipe_obat, ['class' => 'form-control']) }}
        </div>
        <br>

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.obat')
    @endsection