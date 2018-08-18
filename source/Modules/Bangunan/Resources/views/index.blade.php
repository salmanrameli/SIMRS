@extends('layouttemplate::master')

@section('title')
    Manajemen Bangunan
    @endsection

@section('content')
    @if(Auth::user()->jabatan_id == 1)
        <div class="d-none d-sm-block">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahLantai">Tambah Lantai Baru</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-none">
            <div class="card card-body">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahLantai">Tambah Lantai Baru</button>
            </div>
        </div>
    @endif

    @foreach($lantais as $lantai)
        <div class="card">
            <div class="card-header">
                <div class="d-none d-sm-block">
                    @if(Auth::user()->jabatan_id == 1)
                        <h5>
                            Lantai {{ $lantai->nomor_lantai }}
                            @if(Auth::user()->jabatan_id == 1)
                                <button type="button" class="btn btn-sm btn-outline-primary" style="margin-left: 15px" data-toggle="modal" data-nomor="{{ $lantai->nomor_lantai }}" data-target="#modalTambahKamar">Tambah Kamar Baru</button>
                                <div class="row float-right">
                                    <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-lantai="{{ $lantai->id }}" data-nomor="{{ $lantai->nomor_lantai }}" data-target="#modalUbahLantai">Ubah</button>

                                    {{ Form::open(['method' => 'delete', 'route' => ['lantai.delete', $lantai->id]]) }}
                                    <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 10px" onclick="return confirm('Apakah anda yakin menghapus lantai ini?')">Hapus</button>
                                    {{ Form::close() }}
                                </div>
                            @endif
                        </h5>
                    @endif
                </div>

                <div class="d-sm-none">
                    @if(Auth::user()->jabatan_id == 1)
                        <h5>
                            Lantai {{ $lantai->nomor_lantai }}
                            @if(Auth::user()->jabatan_id == 1)
                                <button type="button" class="btn btn-sm btn-outline-primary" style="margin-left: 15px" data-toggle="modal" data-nomor="{{ $lantai->nomor_lantai }}" data-target="#modalTambahKamar">Tambah Kamar Baru</button>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-sm btn-warning btn-block" data-toggle="modal" data-id-lantai="{{ $lantai->id }}" data-nomor="{{ $lantai->nomor_lantai }}" data-target="#modalUbahLantai" style="margin-top: 10px">Ubah</button>

                                        {{ Form::open(['method' => 'delete', 'route' => ['lantai.delete', $lantai->id]]) }}
                                        <button type="submit" class="btn btn-sm btn-danger btn-block" style="margin-top: 10px" onclick="return confirm('Apakah anda yakin menghapus lantai ini?')">Hapus</button>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            @endif
                        </h5>
                    @endif
                </div>
            </div>

            <div class="card-body row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($kamars as $kamar)
                            @if($lantai->nomor_lantai == $kamar->nomor_lantai)
                                <div class="col-md-2">
                                    <div class="card card-body">
                                        <h6 class="text-center">Kamar {{ $kamar->nama_kamar }}</h6>
                                        <table class="table table-striped">
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
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-id-kamar="{{ $kamar->id }}" data-nama-kamar="{{ $kamar->nama_kamar }}" data-jumlah-maks="{{ $kamar->jumlah_maks_pasien }}" data-target="#modalUbahKamar" style="width: 100%">Ubah</button>
                                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{ Form::open([ 'method' => 'delete', 'route' => ['kamar.delete', $kamar->id]]) }}
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin menghapus kamar ini?')">Hapus</button>
                                                    {{ Form::close() }}
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
@endsection

@section('modal')
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

    <div class="modal fade" id="modalTambahKamar" tabindex="-1" role="dialog" aria-labelledby="modalTambahKamar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKamar">Tambah Kamar Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'kamar.store']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('nomor_lantai', 'Nomor Lantai', ['class' => 'control-label']) }}
                        {{ Form::text('nomor_lantai', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama_kamar', 'Nama Kamar', ['class' => 'control-label']) }}
                        {{ Form::text('nama_kamar', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jumlah_maks_pasien', 'Jumlah Maksimal Pasien', ['class' => 'control-label']) }}
                        {{ Form::number('jumlah_maks_pasien', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Tambahkan Kamar', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahKamar" tabindex="-1" role="dialog" aria-labelledby="modalUbahKamar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahKamar">Ubah Rincian Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'kamar.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id_kamar', 'ID Kamar', ['class' => 'control-label']) }}
                        {{ Form::text('id_kamar', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama_kamar', 'Nama Kamar', ['class' => 'control-label']) }}
                        {{ Form::text('nama_kamar', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jumlah_maks_pasien', 'Jumlah Maksimal Pasien', ['class' => 'control-label']) }}
                        {{ Form::number('jumlah_maks_pasien', null, ['class' => 'form-control']) }}
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

            $('#modalTambahKamar').on("show.bs.modal", function (e) {
                $("#modalTambahKamar").find('#nomor_lantai').val($(e.relatedTarget).data('nomor'));
                $("#modalTambahKamar").find('#nama_kamar').val('');
                $("#modalTambahKamar").find('#jumlah_maks_pasien').val('');
            });

            $('#modalUbahKamar').on("show.bs.modal", function (e) {
                $("#modalUbahKamar").find('#id_kamar').val($(e.relatedTarget).data('id-kamar'));
                $("#modalUbahKamar").find('#nama_kamar').val($(e.relatedTarget).data('nama-kamar'));
                $("#modalUbahKamar").find('#jumlah_maks_pasien').val($(e.relatedTarget).data('jumlah-maks'));
            });
        });
    </script>
    @include('layouttemplate::attributes.bangunan')
    @endsection
