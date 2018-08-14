@extends('layouttemplate::master')

@section('title')
    Ubah Data Dokter
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2>Ubah Data Dokter: {{ $dokter->nama }}</h2>
                                <hr>
                            </div>
                            {{ Form::model($dokter, ['method' => 'PATCH', 'route' => ['dokter.update', $dokter->id]]) }}

                            <div class="form-group">
                                {{ Form::label('id_user', 'ID Dokter', ['class' => 'control-label']) }}
                                {{ Form::text('id_user', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('nama', 'Nama Dokter', ['class' => 'control-label']) }}
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

                            <br>

                            {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('content-mobile')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body" style="width: 48vh">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2>Ubah Data Dokter: {{ $dokter->nama }}</h2>
                                <hr>
                            </div>
                            {{ Form::model($dokter, ['method' => 'PATCH', 'route' => ['dokter.update', $dokter->id]]) }}

                            <div class="form-group">
                                {{ Form::label('id_user', 'ID Dokter', ['class' => 'control-label']) }}
                                {{ Form::text('id_user', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('nama', 'Nama Dokter', ['class' => 'control-label']) }}
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

                            <br>

                            {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection