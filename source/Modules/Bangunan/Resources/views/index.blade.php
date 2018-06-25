@extends('layouttemplate::master')

@section('title')
    Manajemen Bangunan
    @endsection

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
                            <h5>
                                Lantai {{ $lantai->nomor_lantai }}
                                <div class="row float-right">
                                    <a href="{{ route('lantai.edit', $lantai->id) }}" class="btn btn-sm btn-warning float-right">Ubah</a>

                                    {{ Form::open(['route' => ['lantai.delete', $lantai->id], 'method' => 'delete']) }}
                                    <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 10px" onclick="return confirm('Apakah anda yakin menghapus lantai ini?')">Hapus</button>
                                    {{ Form::close() }}
                                </div>
                            </h5>
                        </div>
                        <div class="card-body row align-items-center justify-content-center">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($kamars as $kamar)
                                        @if($lantai->nomor_lantai == $kamar->nomor_lantai)
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
                                                    <div class="btn-group">
                                                        <a href="{{ route('kamar.show', $kamar->id) }}" class="btn btn-outline-info">Detail...</a>
                                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('kamar.edit', $kamar->id) }}">Ubah</a>
                                                        </div>
                                                    </div>
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
