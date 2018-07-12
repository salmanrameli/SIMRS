@extends('layouttemplate::master')

@section('title')
    Tambah Konsumsi Obat
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Tambah Konsumsi Obat Pasien: {{ $ranap->pasien->nama }}</h4>
                    <br>
                </div>

                {{ Form::open(['method' => 'POST', 'route' => ['rincian_konsumsi_obat.store', $ranap->id, $obat->id]]) }}
                <div hidden>
                    {{ Form::text('id_ranap', $ranap->id) }}
                    {{ Form::text('waktu', 'pagi') }}
                </div>

                <div class="form-group">
                {{ Form::label('jumlah', 'Jumlah', ['class' => 'control-label']) }}
                {{ Form::text('jumlah', null, ['class' => 'form-control']) }}
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