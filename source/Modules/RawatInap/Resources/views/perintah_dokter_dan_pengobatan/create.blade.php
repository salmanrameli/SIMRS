@extends('layouttemplate::master')

@section('title')
    Catatan Perintah Dokter dan Pengobatan Baru
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Buat Catatan Perintah Dokter dan Pengobatan Pasien: {{ $pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::open(['route' => ['perintah_dokter_dan_pengobatan.store', $pasien->id], 'method' => 'POST']) }}
                <div hidden>
                    {{ Form::text('id_pasien', $pasien->id) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tanggal_keterangan', 'Tanggal', ['class' => 'control-label']) }}
                    {{ Form::date('tanggal_keterangan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('terapi_dan_rencana_tindakan', 'Terapi dan Rencana Tindakan', ['class' => 'control-label']) }}
                    {{ Form::textarea('terapi_dan_rencana_tindakan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                    {{ Form::textarea('catatan_perawat', null, ['class' => 'form-control']) }}
                </div>

                <div hidden>
                    {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                </div>

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
@endsection