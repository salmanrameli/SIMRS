@extends('layouttemplate::pages')

@section('title')
    Tambah Kamar Baru
    @endsection()

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['route' => 'kamar.store']) }}

                <div class="form-group">
                    {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                    <select class="form-control" name="nomor_lantai">
                        @foreach($lantais as $lantai)
                            <option value="{{ $lantai }}" id="nomor_lantai" name="{{ $lantai }}">{{ $lantai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{ Form::label('nama_kamar', 'Nama / Nomor Kamar', ['class' => 'control-label']) }}
                    {{ Form::text('nama_kamar', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('jumlah_maks_pasien', 'Jumlah Maksimal Pasien', ['class' => 'control-label']) }}
                    {{ Form::text('jumlah_maks_pasien', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Simpan Kamar', ['class' => 'btn btn-outline-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
@endsection