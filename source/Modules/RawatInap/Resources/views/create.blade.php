@extends('layouttemplate::pages-alt')

@section('title')
    Registrasi Rawat Inap Baru
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Registrasi Rawat Inap Baru</h4>
                    <hr>
                    {{ Form::open(['route' => 'ranap.store']) }}

                    <div class="form-group">
                        {{ Form::label('id_rm', 'Nomor Rekam Medis', ['class' => 'control-label']) }}
                        {{ Form::text('id_rm', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('id_pasien', 'ID Pasien', ['class' => 'control-label']) }}
                        {{ Form::text('id_pasien', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama_kamar', 'Kamar', ['class' => 'control-label']) }}
                        <select class="form-control" name="nama_kamar">
                            @foreach($kosongs as $kosong)
                                <option value="{{ $kosong }}" id="nama_kamar" name="{{ $kosong }}">{{ $kosong }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{ Form::label('id_dokter_pj', 'Dokter Penanggung Jawab', ['class' => 'control-label']) }}
                        <select class="form-control" name="id_dokter_pj">
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}" id="id_dokter_pj" name="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{ Form::label('tanggal_masuk', 'Tanggal Masuk', ['class' => 'control-label']) }}
                        {{ Form::date('tanggal_masuk', new DateTime(), ['class' => 'form-control']) }}
                    </div>

                    <br>

                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endsection