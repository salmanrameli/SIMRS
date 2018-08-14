@extends('layouttemplate::master')

@section('title')
    Registrasi Akun
@endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="d-none d-sm-block">
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
                </div>

                <div class="d-block d-sm-none">
                    <div class="card card-body" style="width: 48vh">
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
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection