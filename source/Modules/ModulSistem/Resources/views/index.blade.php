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
                                    <th>Hak Akses</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modul->jabatan as $akses)
                                <tr>
                                    <td>{{ ucwords($akses->nama) }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['modul.hapus_jabatan',  $modul->id,  $akses->id], 'method' => 'delete']) }}
                                        <button type="submit" class="btn btn-danger float-right"><span class="fas fa-trash-alt"></span> Hapus</button>
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
    @endsection

@section('script')
    <script>
        $(function() {
            $('#modalTambahHakAkses').on("show.bs.modal", function (e) {
                $("#modalTambahHakAkses").find('#id_modul').val($(e.relatedTarget).data('id-modul'));
            });
        });
    </script>
    @include('modulsistem::attribute.nav')
    @endsection
