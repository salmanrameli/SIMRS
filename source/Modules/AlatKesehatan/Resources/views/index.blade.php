@extends('layouttemplate::master')

@section('title')
    Manajemen Alat Kesehatan
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="page-header">
                <h3>Manajemen Alat Kesehatan</h3>
                <br>
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
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahAlatKesehatan">Tambah Alat Kesehatan Baru</button>
                                <br><br>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alkess as $alkes)
                                        <tr>
                                            <td class="w-50">{{ ucfirst($alkes->nama) }}</td>
                                            <td class="w-50">{{ $alkes->harga }} <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-alat="{{ $alkes->id }}" data-nama="{{ $alkes->nama }}" data-harga="{{ $alkes->harga }}" data-target="#modalUbahAlatKesehatan">Ubah</button></td>
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

    <div class="modal fade" id="modalTambahAlatKesehatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahAlatKesehatan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahAlatKesehatan">Tambah Alat Kesehatan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'alat_kesehatan.store']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahAlatKesehatan" tabindex="-1" role="dialog" aria-labelledby="modalUbahAlatKesehatan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahAlatKesehatan">Ubah Rincian Alat Kesehatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'alat_kesehatan.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id_alat_kesehatan', 'ID Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('id_alat_kesehatan', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
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
            <div class="page-header">
                <h3>Manajemen Alat Kesehatan</h3>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-12 d-block d-sm-none">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahAlatKesehatanMobile">Tambah Alat Kesehatan Baru</button>
                            <br><br>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alkess as $alkes)
                                    <tr>
                                        <td class="w-50">{{ ucfirst($alkes->nama) }}</td>
                                        <td class="w-50">{{ $alkes->harga }}</td>
                                        <td><button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-alat="{{ $alkes->id }}" data-nama="{{ $alkes->nama }}" data-harga="{{ $alkes->harga }}" data-target="#modalUbahAlatKesehatanMobile">Ubah</button></td>
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

    <div class="modal fade" id="modalTambahAlatKesehatanMobile" tabindex="-1" role="dialog" aria-labelledby="modalTambahAlatKesehatanMobile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahAlatKesehatanMobile">Tambah Alat Kesehatan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'alat_kesehatan.store']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahAlatKesehatanMobile" tabindex="-1" role="dialog" aria-labelledby="modalUbahAlatKesehatanMobile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahAlatKesehatanMobile">Ubah Rincian Alat Kesehatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'alat_kesehatan.update']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id_alat_kesehatan', 'ID Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('id_alat_kesehatan', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Alat Kesehatan', ['class' => 'control-label']) }}
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('harga', 'Harga', ['class' => 'control-label']) }}
                        {{ Form::number('harga', null, ['class' => 'form-control']) }}
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
            $('#modalUbahAlatKesehatan').on("show.bs.modal", function (e) {
                $("#modalUbahAlatKesehatan").find('#id_alat_kesehatan').val($(e.relatedTarget).data('id-alat'));
                $("#modalUbahAlatKesehatan").find('#nama').val($(e.relatedTarget).data('nama'));
                $("#modalUbahAlatKesehatan").find('#harga').val($(e.relatedTarget).data('harga'));
            });

            $('#modalUbahAlatKesehatanMobile').on("show.bs.modal", function (e) {
                $("#modalUbahAlatKesehatanMobile").find('#id_alat_kesehatan').val($(e.relatedTarget).data('id-alat'));
                $("#modalUbahAlatKesehatanMobile").find('#nama').val($(e.relatedTarget).data('nama'));
                $("#modalUbahAlatKesehatanMobile").find('#harga').val($(e.relatedTarget).data('harga'));
            });
        });
    </script>
    @include('layouttemplate::attributes.alkes')
@endsection
