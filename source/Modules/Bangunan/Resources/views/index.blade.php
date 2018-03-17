@extends('layouttemplate::pages')

@section('content')
    <div class="page-header">
        <h3>Manajemen Bangunan</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('lantai.create') }}" class="btn btn-outline-primary">Tambah Lantai Baru</a>
                        <a href="{{ route('kamar.create') }}" class="btn btn-outline-primary">Tambah Kamar Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                @foreach($lantais as $lantai)
                    <div class="card">
                        <div class="card-header">
                            <h5>Lantai {{ $lantai }}</h5>
                        </div>
                        <div class="card-body row align-items-center justify-content-center">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($kamars as $kamar)
                                        @if($lantai == $kamar->nomor_lantai)
                                            <div class="col-md-2">
                                                <div class="card card-body">
                                                    <h6 class="text-center">Kamar {{ $kamar->nama_kamar }}</h6>
                                                    <table class="table">
                                                        <tbody class="small">
                                                        <tr>
                                                            <th>Kapasitas</th>
                                                            <td>{{ $kamar->jumlah_maks_pasien }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Terisi</th>
                                                            @foreach($terisis as $terisi)
                                                                @if($terisi->nama_kamar == $kamar->nama_kamar)
                                                                    <td>{{ $terisi->pasien_inap }}</td>
                                                                @endif
                                                            @endforeach
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <a href="{{ route('ranap.kamar.show', $kamar->nama_kamar) }}" class="btn btn-outline-info btn-sm">Detail...</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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
