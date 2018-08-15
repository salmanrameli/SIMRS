@extends('layouttemplate::master')

@section('title')
    Manajemen Obat
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>Manajemen Obat</h3>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="d-none d-sm-block">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahObat">Daftarkan Obat Baru</button>
                                <br><br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($obats as $obat)
                                        <tr>
                                            <td>{{ ucwords($obat->nama) }}</td>
                                            <td>{{ ucfirst($obat->tipe_obat) }}</td>
                                            <td>
                                                {{ $obat->harga }}
                                                <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-nama="{{ $obat->nama }}" data-harga="{{ $obat->harga }}" data-tipe="{{ $obat->tipe_obat }}" data-target="#modalUbahObat">Ubah</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahObat" tabindex="-1" role="dialog" aria-labelledby="modalTambahObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahObat">Masukkan Obat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'obat.store']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Obat', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
                        {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahObat" tabindex="-1" role="dialog" aria-labelledby="modalUbahObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahObat">Ubah Rincian Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'obat.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id', 'ID Obat', ['class' => 'control-label']) }}
                        {{ Form::text('id', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Obat', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
                        {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('content-mobile')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>Manajemen Obat</h3>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block d-sm-none">
        <div class="card card-body">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahObatMobile">Daftarkan Obat Baru</button>
            <br>
            <table class="table small">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($obats as $obat)
                    <tr>
                        <td>{{ ucwords($obat->nama) }}</td>
                        <td>{{ ucfirst($obat->tipe_obat) }}</td>
                        <td>{{ $obat->harga }}</td>
                        <td><button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-nama="{{ $obat->nama }}" data-harga="{{ $obat->harga }}" data-tipe="{{ $obat->tipe_obat }}" data-target="#modalUbahObatMobile">Ubah</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambahObatMobile" tabindex="-1" role="dialog" aria-labelledby="modalTambahObatMobile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahObatMobile">Masukkan Obat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'obat.store']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Obat', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
                        {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahObatMobile" tabindex="-1" role="dialog" aria-labelledby="modalUbahObatMobile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahObatMobile">Ubah Rincian Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'obat.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id', 'ID Obat', ['class' => 'control-label']) }}
                        {{ Form::text('id', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Obat', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('jenis', 'Jenis Obat', ['class' => 'control-label']) }}
                        {{ Form::select('jenis', ['injeksi' => 'Injeksi', 'oral' => 'Oral', 'kompress' => 'Kompress', 'suppositoria' => 'Suppositoria'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        $(function() {
            $('#modalUbahObat').on("show.bs.modal", function (e) {
                $("#modalUbahObat").find('#id').val($(e.relatedTarget).data('id-obat'));
                $("#modalUbahObat").find('#nama').val($(e.relatedTarget).data('nama'));
                $("#modalUbahObat").find('#harga').val($(e.relatedTarget).data('harga'));
                $("#modalUbahObat").find('#jenis').val($(e.relatedTarget).data('tipe')).change();
            });

            $('#modalUbahObatMobile').on("show.bs.modal", function (e) {
                $("#modalUbahObatMobile").find('#id').val($(e.relatedTarget).data('id-obat'));
                $("#modalUbahObatMobile").find('#nama').val($(e.relatedTarget).data('nama'));
                $("#modalUbahObatMobile").find('#harga').val($(e.relatedTarget).data('harga'));
                $("#modalUbahObatMobile").find('#jenis').val($(e.relatedTarget).data('tipe')).change();
            });
        });
    </script>
    @include('layouttemplate::attributes.obat')
    @endsection
