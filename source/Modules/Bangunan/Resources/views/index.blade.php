@extends('layouttemplate::master')

@section('title')
    Manajemen Bangunan
    @endsection

@section('content')
    @if(Auth::user()->jabatan_id == 1)
    <div class="page-header">
        <h3>Manajemen Bangunan</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{--<a href="{{ route('lantai.create') }}" class="btn btn-outline-primary">Tambah Lantai Baru</a>--}}
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahLantai">Tambah Lantai Baru</button>
                        <a href="{{ route('kamar.create') }}" class="btn btn-outline-primary">Tambah Kamar Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                @foreach($lantais as $lantai)
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                Lantai {{ $lantai->nomor_lantai }}
                                @if(Auth::user()->jabatan_id == 1)
                                    <div class="row float-right">
                                        <a href="{{ route('lantai.edit', $lantai->id) }}" class="btn btn-sm btn-warning float-right">Ubah</a>

                                        {{ Form::open(['route' => ['lantai.delete', $lantai->id], 'method' => 'delete']) }}
                                        <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 10px" onclick="return confirm('Apakah anda yakin menghapus lantai ini?')">Hapus</button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
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
                                                    @if(Auth::user()->jabatan_id == 1)
                                                        <div class="btn-group">
                                                            <a href="{{ route('kamar.show', $kamar->id) }}" class="btn btn-outline-info">Detail...</a>
                                                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('kamar.edit', $kamar->id) }}">Ubah</a>
                                                            </div>
                                                        </div>
                                                        @endif
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

    <div class="modal fade" id="modalTambahLantai" tabindex="-1" role="dialog" aria-labelledby="modalTambahLantai" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLantai">Tambah Lantai Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'lantai.store']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                        {{ Form::text('nomor_lantai', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Tambahkan Lantai', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection
