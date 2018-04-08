@extends('layouttemplate::pages')

@section('title')
    Catatan Perjalanan Penyakit Baru
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Perjalanan Penyakit Pasien</h4>
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

                {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection