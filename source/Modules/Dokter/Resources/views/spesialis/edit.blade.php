@extends('layouttemplate::pages')

@section('title')
    Ubah Detail Spesialis
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($spesialis, ['method' => 'PATCH', 'route' => ['spesialis.update', $spesialis->id]]) }}

                <div class="form-group">
                    {{ Form::label('nama', 'Nama Bidang Spesialis', ['class' => 'control-label']) }}
                    {{ Form::text('nama', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection