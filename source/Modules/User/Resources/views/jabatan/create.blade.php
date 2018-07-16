@extends('layouttemplate::master')

@section('title')
    Buat Jabatan Baru
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['route' => 'jabatan.store']) }}

                <div class="form-group">
                    {{ Form::label('nama', 'Nama Jabatan', ['class' => 'control-label']) }}
                    {{ Form::text('nama', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection()

@section('script')
    @include('layouttemplate::attributes.user')
    @endsection