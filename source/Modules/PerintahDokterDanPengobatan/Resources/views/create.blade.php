@extends('layouttemplate::master')

@section('title')
    Catatan Perintah Dokter dan Pengobatan Baru
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Buat Catatan Perintah Dokter dan Pengobatan Pasien: {{ $perintah->rawat_inap->pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::open(['route' => ['perintah_dokter_dan_pengobatan.store', $id_ranap], 'method' => 'POST']) }}
                <div hidden>
                    {{ Form::text('id_ranap', $id_ranap) }}
                    {{ Form::text('id_perintah', $perintah->id) }}
                </div>

                <label><b>Terapi dan Rencana Tindakan:</b></label>
                <p>{!! $perintah->planning_perintah_dokter_dan_pengobatan !!}</p>
                <hr>

                <div class="form-group">
                    {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                    {{ Form::textarea('catatan_perawat', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

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