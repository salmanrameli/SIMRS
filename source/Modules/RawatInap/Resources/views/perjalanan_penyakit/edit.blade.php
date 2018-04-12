@extends('layouttemplate::master')

@section('title')
    Ubah Catatan Perjalanan Penyakit
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Ubah Catatan Perjalanan Penyakit Pasien: {{ $pasien }}</h4>
                    <br>
                </div>

                {{ Form::model($perjalanan, ['method' => 'PATCH', 'route' => ['perjalanan_penyakit.update', $perjalanan->id_pasien, $perjalanan->id]]) }}
                <div hidden>
                    {{ Form::text('id_pasien', $perjalanan->id_pasien) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tanggal_keterangan', 'Tanggal', ['class' => 'control-label']) }}
                    {{ Form::date('tanggal_keterangan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('subjektif', 'Subjektif', ['class' => 'control-label']) }}
                    {{ Form::textarea('subjektif', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('objektif', 'Objektif', ['class' => 'control-label']) }}
                    {{ Form::textarea('objektif', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('assessment', 'Assessment', ['class' => 'control-label']) }}
                    {{ Form::textarea('assessment', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('planning_perintah_dokter_dan_pengobatan', 'Planning / Perintah Dokter dan Pengobatan', ['class' => 'control-label']) }}
                    {{ Form::textarea('planning_perintah_dokter_dan_pengobatan', null, ['class' => 'form-control']) }}
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