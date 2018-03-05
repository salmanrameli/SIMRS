@extends('layouttemplate::pages-alt')

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Registrasi Rawat Inap Baru</h4>
                    <hr>
                    {{ Form::open(['route' => 'ranap.store']) }}

                    <div class="form-group">
                        {{ Form::label('nama_pasien', 'Nama Pasien', ['class' => 'control-label']) }}
                        {{ Form::text('nama_pasien', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nomor_kamar', 'Nomor Kamar', ['class' => 'control-label']) }}
                        {{ Form::text('nomor_kamar', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('dokter_pj', 'Dokter Penanggung Jawab', ['class' => 'control-label']) }}
                        {{ Form::text('dokter_pj', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tanggal_masuk', 'Tanggal Masuk', ['class' => 'control-label']) }}
                        {{ Form::date('tanggal_masuk', new DateTime(), ['class' => 'form-control']) }}
                    </div>

                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endsection