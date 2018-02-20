@extends('layouttemplate::pages')

@section('title')
    Manajemen Lantai & Kamar
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('lantai.create') }}" class="btn btn-outline-primary">Tambah Lantai Baru</a>
                <a href="{{ route('kamar.create') }}" class="btn btn-outline-primary">Tambah Kamar Baru</a>
            </div>
        </div>
    </div>
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                {{--{{ $kamars }}--}}
                @foreach($kamars as $kamar)
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-body">
                                <h3>Lantai {{ $kamar->nomor_lantai }}</h3>
                                <hr>
                                <p>Jumlah Kamar: {{ $kamar->total_kamar }}</p>
                                <p>Kamar Penuh: </p>
                                <a href="{{ route('lantai.show', $kamar->nomor_lantai) }}" class="btn btn-outline-info float-left">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection
