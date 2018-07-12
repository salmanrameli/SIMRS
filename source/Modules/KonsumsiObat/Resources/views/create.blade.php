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

                {{ Form::open(['method' => 'POST', 'route' => ['konsumsi_obat.store', $ranap->id]]) }}
                <div hidden>
                    {{ Form::text('id_ranap', $ranap->id) }}
                </div>

                <div class="form-group">
                    <label for="datepicker" id="tanggal" class="control-label">Tanggal</label>
                    <input type="text" id="datepicker" name="tanggal" class="form-control" placeholder="yyyy-mm-dd">
                </div>

                <div class="form-group">
                    {{ Form::label('hari_perawatan', 'Hari Perawatan', ['class' => 'control-label']) }}
                    {{ Form::text('hari_perawatan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('id_obat', 'Obat', ['class' => 'control-label']) }}
                    <select class="form-control" name="id_obat">
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}" id="id_obat" name="{{ $obat->id }}">{{ ucfirst($obat->nama) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{ Form::label('dosis', 'Dosis', ['class' => 'control-label']) }}
                    {{ Form::text('dosis', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tinggi_badan', 'Tinggi Badan', ['class' => 'control-label']) }}
                    {{ Form::text('tinggi_badan', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('berat_badan', 'Berat Badan', ['class' => 'control-label']) }}
                    {{ Form::text('berat_badan', null, ['class' => 'form-control']) }}
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