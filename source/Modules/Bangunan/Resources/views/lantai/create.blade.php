@extends('layouttemplate::master')

@section('title')
    Tambah Lantai Baru
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['route' => 'lantai.store']) }}

                <div class="form-group">
                    {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                    {{ Form::text('nomor_lantai', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Tambahkan Lantai', ['class' => 'btn btn-outline-success float-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection