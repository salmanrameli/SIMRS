@extends('layouttemplate::master')

@section('title')
    Konfigurasi Hak Akses Modul
    @endsection

@section('content')
    <div class="card card-body">

        {{ Form::model($hak_akses, ['method' => 'PATCH', 'route' => 'modul.update']) }}

        <div class="form-group">
            {{ Form::label('jabatan_id[]', 'Hak Akses', ['class' => 'control-label']) }}
            @foreach($jabatans as $jabatan)
                <div class="form-check">
                    <label class="checkbox">
                        <input type="checkbox" id="jabatan_id" name="jabatan_id[]" value="{{ $jabatan->id }}" {{ in_array($jabatan->id, $hak_akses) ? 'checked' : '' }}> {{ ucwords($jabatan->nama) }}
                    </label>
                </div>
            @endforeach
        </div>

        {{ Form::submit('Simpan Konfigurasi', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}

    </div>
    @endsection