@extends('layouttemplate::master')

@section('title')
    Jabatan
    @endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            @if($jabatan->userCanCreate(Auth::user()))
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahJabatan">Daftarkan Jabatan Baru</button>
            @endif
            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jabatans as $jabatan)
                    <tr>
                        <td>{{ ucfirst($jabatan->nama) }}</td>
                        <td>
                            @if($jabatan->userCanUpdate(Auth::user()))
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-id-jabatan="{{ $jabatan->id }}" data-nama-jabatan="{{ $jabatan->nama }}" data-target="#modalUbahJabatan">Ubah</button>
                                @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('modal')
    <div class="modal fade" id="modalTambahJabatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahJabatan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahJabatan">Buat Jabatan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'POST', 'route' => ['jabatan.store']]) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Jabatan', ['class' => 'control-label']) }}
                        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahJabatan" tabindex="-1" role="dialog" aria-labelledby="modalUbahJabatan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahJabatan">Ubah Rincian Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'PATCH', 'route' => ['jabatan.update']]) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        {{ Form::label('id_jabatan', 'ID Jabatan', ['class' => 'control-label']) }}
                        {!! Form::text('id_jabatan', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nama_jabatan', 'Nama Jabatan', ['class' => 'control-label']) }}
                        {!! Form::text('nama_jabatan', null, ['class' => 'form-control']) !!}
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
        $(document).ready(function () {
            $('#modalUbahJabatan').on("shown.bs.modal", function (e) {
                $("#modalUbahJabatan").find('#id_jabatan').val($(e.relatedTarget).data('id-jabatan'));
                $("#modalUbahJabatan").find('#nama_jabatan').val($(e.relatedTarget).data('nama-jabatan'));
            });
        });
    </script>
    @include('jabatan::attribute.nav')
@endsection
