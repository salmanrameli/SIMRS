@extends('layouttemplate::pages-alt')

@section('title')
    Ubah Detail Rawat Inap
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Ubah Detail Rawat Inap: {{ $ranap->pasien->nama }}</h4>
                    <hr>
                    {{ Form::model($ranap, ['method' => 'PATCH', 'route' => ['ranap.update', $ranap->id]]) }}

                    <div class="form-group">
                        {{ Form::label('id_pasien', 'ID Pasien', ['class' => 'control-label']) }}
                        {{ Form::text('id_pasien', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama_kamar', 'Kamar', ['class' => 'control-label']) }}
                        <select class="form-control" name="nama_kamar">
                            @foreach($kosongs as $kosong)
                                <option value="{{ $kosong }}" id="nama_kamar" name="{{ $kosong }}" {{ $ranap->nama_kamar == $kosong ? 'selected' : '' }}>{{ $kosong }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{ Form::label('id_dokter_pj', 'Dokter Penanggung Jawab', ['class' => 'control-label']) }}
                        <select class="form-control" name="id_dokter_pj">
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}" id="id_dokter_pj" name="{{ $dokter->id }}" {{ $ranap->id_dokter_pj == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
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