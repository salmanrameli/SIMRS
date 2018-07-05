@extends('layouttemplate::master')

@section('title')
    Ubah Catatan Harian dan Perawatan
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Ubah Catatan Harian dan Perawatan Pasien: {{ $ranap->pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::model($catatan, ['method' => 'PATCH', 'route' => ['catatan_harian_perawatan.update', $ranap->id, $catatan->id]]) }}

                <div class="form-group">
                    {{ Form::label('tanggal_keterangan', 'Tanggal', ['class' => 'control-label']) }}
                    {{ Form::date('tanggal_keterangan', null, ['class' => 'form-control']) }}
                </div>

                <div class="bootstrap-timepicker">
                    <label for="jam">Jam (HH:MM)</label>
                    <input id="timepicker" type="text" class="input-small form-control" name="jam" value="{{ $catatan->jam }}">
                </div>
                <br>
                <div class="form-group">
                    {{ Form::label('asuhan_keperawatan_soap', 'Asuhan Keperawatan', ['class' => 'control-label']) }}
                    {{ Form::textarea('asuhan_keperawatan_soap', null, ['class' => 'form-control']) }}
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
    <script type="text/javascript">
        // $('#timepicker').timepicker({
        //     template: false,
        //     showInputs: false,
        //     minuteStep: 1,
        //     showMeridian: false
        // });

        $(function(){
            $("textarea").htmlarea();
        });
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection