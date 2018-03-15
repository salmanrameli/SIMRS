@extends('layouttemplate::pages')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Lantai {{ $nomor_lantai }}</h2>
                            <hr>
                        </div>
                        <div class="row">
                            @foreach($kamars as $kamar)
                                <div class="col-md-3">
                                    <div class="card card-body">
                                        <p>Nama Kamar: {{ $kamar->nama_kamar }}</p>
                                        <p>Jumlah Maksimal Pasien: {{ $kamar->jumlah_maks_pasien }}</p>
                                        <a href="{{ route('kamar.show', ['id' => $kamar->id]) }}" class="btn btn-outline-info">Lihat Detail</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection