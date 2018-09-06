@extends('layouttemplate::master')

@section('title')
    Manajemen Modul Sistem
    @endsection

@section('content')
    <div class="row">
        @foreach($moduls as $modul)
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span class="{{ $modul->icon }}"></span>&nbsp;&nbsp;<b>{{ ucwords($modul->nama) }}</b>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modalTambahHakAkses" data-id-modul="{{ $modul->id }}"><span class="fas fa-plus"></span> Tambah Hak Akses</button>
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modul->jabatan as $akses)
                                <tr style="border-top: solid 1px black">
                                    <td colspan="2">{{ ucwords($akses->nama) }}</td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalUbahPermissionModul" data-id-modul="{{ $modul->id }}" data-id-jabatan="{{ $akses->id }}" data-create="{{ $akses->pivot->create }}" data-read="{{ $akses->pivot->read }}" data-update="{{ $akses->pivot->update }}" data-delete="{{ $akses->pivot->delete }}">Atur Permission</button></td>
                                    <td>
                                        {{ Form::open(['route' => ['modul.hapus_jabatan',  $modul->id,  $akses->id], 'method' => 'delete']) }}
                                        <button type="submit" class="btn btn-danger btn-block"><span class="fas fa-trash-alt"></span> Hapus</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('modal')
    <div class="modal fade" id="modalTambahHakAkses" tabindex="-1" role="dialog" aria-labelledby="modalTambahHakAkses" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahHakAkses">Tambah Hak Akses Modul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'modul.add_hak_akses']) }}
                <div class="modal-body">
                    @foreach($jabatans as $jabatan)
                        {{ Form::checkbox('id_jabatan[]', $jabatan->id, false) }}&nbsp;
                        {{ Form::label('id_jabatan', ucwords($jabatan->nama), ['class' => 'control-label']) }}
                        <br>
                        @endforeach

                    <div class="form-group" hidden>
                        {{ Form::label('id_modul', 'ID Modul', ['class' => 'control-label']) }}
                        {{ Form::text('id_modul', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahPermissionModul" tabindex="-1" role="dialog" aria-labelledby="modalUbahPermissionModul" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahPermissionModul">Atur Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'modul.simpan_permission']) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::checkbox('create', '1', false, ['id' => 'create']) }}&nbsp;
                        {{ Form::label('create', 'Create', ['class' => 'control-label']) }}
                        <br>
                        {{ Form::checkbox('read', '1', false, ['id' => 'read']) }}&nbsp;
                        {{ Form::label('read', 'Read', ['class' => 'control-label']) }}
                        <br>
                        {{ Form::checkbox('update', '1', false, ['id' => 'update']) }}&nbsp;
                        {{ Form::label('update', 'Update', ['class' => 'control-label']) }}
                        <br>
                        {{ Form::checkbox('delete', '1', false, ['id' => 'delete']) }}&nbsp;
                        {{ Form::label('delete', 'Delete', ['class' => 'control-label']) }}
                    </div>

                    <div class="form-group" hidden>
                        {{ Form::label('id_modul', 'ID Modul', ['class' => 'control-label']) }}
                        {{ Form::text('id_modul', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group" hidden>
                        {{ Form::label('id_jabatan', 'ID Jabatan', ['class' => 'control-label']) }}
                        {{ Form::text('id_jabatan', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        $(function() {
            $('#modalTambahHakAkses').on("show.bs.modal", function (e) {
                $("#modalTambahHakAkses").find('#id_modul').val($(e.relatedTarget).data('id-modul'));
            });

            $('#modalUbahPermissionModul').on("show.bs.modal", function (e) {
                $("#modalUbahPermissionModul").find('#id_modul').val($(e.relatedTarget).data('id-modul'));
                $("#modalUbahPermissionModul").find('#id_jabatan').val($(e.relatedTarget).data('id-jabatan'));

                if($(e.relatedTarget).data('create') === 1)
                    $("#modalUbahPermissionModul").find('#create').prop('checked', true);
                else $("#modalUbahPermissionModul").find('#create').prop('checked', false);

                if($(e.relatedTarget).data('read') === 1)
                    $("#modalUbahPermissionModul").find('#read').prop('checked', true);
                else $("#modalUbahPermissionModul").find('#read').prop('checked', false);

                if($(e.relatedTarget).data('update') === 1)
                    $("#modalUbahPermissionModul").find('#update').prop('checked', true);
                else $("#modalUbahPermissionModul").find('#update').prop('checked', false);

                if($(e.relatedTarget).data('delete') === 1)
                    $("#modalUbahPermissionModul").find('#delete').prop('checked', true);
                else $("#modalUbahPermissionModul").find('#delete').prop('checked', false);
            });
        });
    </script>
    @include('modulsistem::attribute.nav')
    @endsection
