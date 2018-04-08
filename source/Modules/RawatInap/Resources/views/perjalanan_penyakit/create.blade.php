@extends('layouttemplate::master')

@section('title')
    Catatan Perjalanan Penyakit Baru
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Buat Catatan Perjalanan Penyakit Pasien: {{ $pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::open(['route' => ['perjalanan_penyakit.store', $pasien->id], 'method' => 'POST']) }}
                <div hidden>
                    {{ Form::text('id_pasien', $pasien->id) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tanggal_keterangan', 'Tanggal', ['class' => 'control-label']) }}
                    {{ Form::date('tanggal_keterangan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('perjalanan_penyakit', 'Perjalanan Penyakit', ['class' => 'control-label']) }}
                    {{ Form::textarea('perjalanan_penyakit', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('perintah_dokter_dan_pengobatan', 'Perintah Dokter dan Pengobatan', ['class' => 'control-label']) }}
                    {{ Form::textarea('perintah_dokter_dan_pengobatan', null, ['class' => 'form-control']) }}
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