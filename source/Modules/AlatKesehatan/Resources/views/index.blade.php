@extends('layouttemplate::master')

@section('title')
    Manajemen Alat Kesehatan
    @endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahAlatKesehatan">Tambah Alat Kesehatan Baru</button>
                <hr>
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
@endsection

@section('modal')
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

@section('script')
    <script>
        $(function() {
            $('#modalUbahAlatKesehatan').on("show.bs.modal", function (e) {
                $("#modalUbahAlatKesehatan").find('#id_alat_kesehatan').val($(e.relatedTarget).data('id-alat'));
                $("#modalUbahAlatKesehatan").find('#nama').val($(e.relatedTarget).data('nama'));
                $("#modalUbahAlatKesehatan").find('#harga').val($(e.relatedTarget).data('harga'));
            });
        });
    </script>
    @include('alatkesehatan::attribute.nav')
@endsection
