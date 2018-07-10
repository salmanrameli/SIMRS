@extends('layouttemplate::master')

@section('title')
    Masukkan Obat Baru
    @endsection

@section('content')
    <div class="card card-body">
        <h3>Masukkan Obat Baru</h3>
        <br>
        {{ Form::open(['route' => 'obat.store']) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama Obat', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
            {{ Form::text('harga', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
            {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], null, ['class' => 'form-control']) }}
        </div>
        <br>
        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.obat')
    @endsection