@extends('layouttemplate::master')

@section('title')
    Ubah Detail Kamar
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($kamar, ['method' => 'PATCH', 'route' => ['kamar.update', $kamar->id]]) }}

                <div class="form-group">
                    {{ Form::label('nama_kamar', 'Nama Kamar', ['class' => 'control-label']) }}
                    {{ Form::text('nama_kamar', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('jumlah_maks_pasien', 'Jumlah Maksimal Pasien', ['class' => 'control-label']) }}
                    {{ Form::text('jumlah_maks_pasien', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
@endsection