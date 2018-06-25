@extends('layouttemplate::master')

@section('title')
    Ubah Detail lantai
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::model($lantai, ['method' => 'PATCH', 'route' => ['lantai.update', $lantai->id]]) }}

                        <div class="form-group">
                            {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                            {{ Form::text('nomor_lantai', null, ['class' => 'form-control']) }}
                        </div>

                        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection