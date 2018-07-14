@extends('layouttemplate::master')

@section('title')
    Catatan Perjalanan Penyakit Baru
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Buat Catatan Perjalanan Penyakit Pasien: {{ $ranap->pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::open(['route' => ['perjalanan_penyakit.store', $ranap->id], 'method' => 'POST']) }}
                <div hidden>
                    {{ Form::text('id_pasien', $ranap->pasien->id) }}
                    {{ Form::text('id_ranap', $ranap->id) }}
                </div>

                <div class="form-group">
                    <label for="datepicker" id="tanggal_keterangan" class="control-label">Tanggal</label>
                    <input type="text" id="datepicker" name="tanggal_keterangan" class="form-control" placeholder="yyyy-mm-dd">
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

                {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        $(function(){
            $("textarea").htmlarea();
        });
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection