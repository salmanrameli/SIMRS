@extends('layouttemplate::master')

@section('title')
    Ubah Catatan Perintah Dokter dan Pengobatan
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Ubah Catatan Perintah Dokter dan Pengobatan Pasien: {{ $pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::model($perintah, ['method' => 'PATCH', 'route' => ['perintah_dokter_dan_pengobatan.update', $perintah->id_pasien, $perintah->id]]) }}
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

                {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
@endsection