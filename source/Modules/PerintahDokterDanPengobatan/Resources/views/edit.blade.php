@extends('layouttemplate::master')

@section('title')
    Ubah Catatan Perintah Dokter dan Pengobatan
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Ubah Catatan Perintah Dokter dan Pengobatan Pasien: {{ $perintah->perjalanan_penyakit->rawat_inap->pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::model($perintah, ['method' => 'PATCH', 'route' => ['perintah_dokter_dan_pengobatan.update', $id_ranap, $perintah->id]]) }}

                <div class="form-group">
                    {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                    {{ Form::textarea('catatan_perawat', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){
            $("textarea").htmlarea();
        });
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection