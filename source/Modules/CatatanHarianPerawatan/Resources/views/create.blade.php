@extends('layouttemplate::master')

@section('title')
    Catatan Harian dan Perawatan Baru
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Buat Catatan Harian dan Perawatan Pasien: {{ ucwords($ranap->pasien->nama) }}</h4>
                    <br>
                </div>

                {{ Form::open(['route' => ['catatan_harian_perawatan.store', $ranap->id], 'method' => 'POST']) }}
                <div hidden>
                    {{ Form::text('id_ranap', $ranap->id) }}
                </div>

                <div class="form-group">
                    <label for="datepicker" id="tanggal_keterangan" class="control-label">Tanggal</label>
                    <input type="text" id="datepicker" name="tanggal_keterangan" class="form-control" placeholder="yyyy-mm-dd">
                </div>

                <div class="bootstrap-timepicker">
                    <label for="jam">Jam (HH:MM)</label>
                    <input id="timepicker" type="text" class="input-small form-control" name="jam">
                </div>
                <br>
                <div class="form-group">
                    {{ Form::label('asuhan_keperawatan_soap', 'Asuhan Keperawatan', ['class' => 'control-label']) }}
                    {{ Form::textarea('asuhan_keperawatan_soap', null, ['class' => 'form-control']) }}
                </div>

                <div hidden>
                    {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                </div>

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        $('#timepicker').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 1,
            showMeridian: false
        });

        $(function(){
            $("textarea").htmlarea();
        });
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection