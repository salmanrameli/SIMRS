@extends('layouttemplate::pages')

@section('title')
    Detail Ruang {{ $kamar->nama_kamar }}
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <a href="{{ route('kamar.edit', ['id' => $kamar->id]) }}" class="btn btn-outline-warning float-right">Ubah Detail Ruang</a>
                    <h2>Ruang {{ $kamar->nama_kamar }}</h2>
                    <hr>
                </div>
                <p>Lokasi: Lantai {{ $kamar->nomor_lantai }}</p>
                <p>Jumlah Maksimal Penghuni: {{ $kamar->jumlah_maks_pasien }}</p>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
@endsection