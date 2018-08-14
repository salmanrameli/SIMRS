@extends('layouttemplate::master')

@section('title')
    Registrasi Dokter Baru
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="d-none d-sm-block">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['route' => 'dokter.store']) }}

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

                                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                {{--tampilan mobile--}}
                <div class="d-block d-sm-none">
                    <div class="card card-body" style="width: 48vh">
                        {{ Form::open(['route' => 'dokter.store']) }}

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

                        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
@endsection