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
                                        <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-lantai="{{ $lantai->id }}" data-nomor="{{ $lantai->nomor_lantai }}" data-target="#modalUbahLantai">Ubah</button>

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

    <div class="modal fade" id="modalUbahLantai" tabindex="-1" role="dialog" aria-labelledby="modalUbahLantai" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahLantai">Ubah Nomor Lantai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'lantai.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id_lantai', 'ID Lantai', ['class' => 'control-label']) }}
                        {{ Form::text('id_lantai', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                        {{ Form::text('nomor_lantai', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#modalUbahLantai').on("show.bs.modal", function (e) {
                $("#modalUbahLantai").find('#id_lantai').val($(e.relatedTarget).data('id-lantai'));
                $("#modalUbahLantai").find('#nomor_lantai').val($(e.relatedTarget).data('nomor'));
            });
        });
    </script>
    @include('layouttemplate::attributes.bangunan')
    @endsection
