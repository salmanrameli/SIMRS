@extends('layouttemplate::master')

@section('title')
    Registrasi Rawat Inap Baru
    @endsection

@section('content')
    <div class="card card-body">
        {{ Form::open(['route' => 'ranap.store']) }}

        <div class="form-group">
            {{ Form::label('id_rm', 'Nomor Rekam Medis', ['class' => 'control-label']) }}
            {{ Form::text('id_rm', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('id_pasien', 'ID Pasien', ['class' => 'control-label']) }}
            {{ Form::text('id_pasien', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label for="datepicker" id="tanggal_masuk" class="control-label">Tanggal Masuk</label>
            <input type="text" id="datepicker" name="tanggal_masuk" class="form-control">
        </div>

        <div class="form-group">
            {{ Form::label('dokter_pengirim', 'Dokter Pengirim', ['class' => 'control-label']) }}
            {{ Form::text('dokter_pengirim', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('id_petugas_penerima', 'Petugas Penerima', ['class' => 'control-label']) }}
            <select class="form-control" name="id_petugas_penerima">
                @foreach($petugass as $petugas)
                    <option value="{{ $petugas->id }}" id="id_petugas_penerima" name="{{ $petugas->id }}">{{ ucwords($petugas->nama) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('diagnosa_awal', 'Diagnosa Awal', ['class' => 'control-label']) }}
            {{ Form::text('diagnosa_awal', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('icd_x_diagnosa_awal', 'ICD X Diagnosa Awal', ['class' => 'control-label']) }}
            {{ Form::text('icd_x_diagnosa_awal', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('id_dokter_pj', 'Dokter Penanggung Jawab', ['class' => 'control-label']) }}
            <select class="form-control" name="id_dokter_pj">
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}" id="id_dokter_pj" name="{{ $dokter->id }}">{{ ucwords($dokter->nama) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('diagnosa_sekunder', 'Diagnosa Sekunder', ['class' => 'control-label']) }}
            {{ Form::text('diagnosa_sekunder', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('icd_x_diagnosa_sekunder', 'ICD X Diagnosa Sekunder', ['class' => 'control-label']) }}
            {{ Form::text('icd_x_diagnosa_sekunder', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama_kamar', 'Kamar', ['class' => 'control-label']) }}
            <select class="form-control" name="nama_kamar">
                @foreach($kosongs as $kosong)
                    <option value="{{ $kosong }}" id="nama_kamar" name="{{ $kosong }}">{{ $kosong }}</option>
                @endforeach
            </select>
        </div>

        <br>

        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection