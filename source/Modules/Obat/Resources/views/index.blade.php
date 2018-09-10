@extends('layouttemplate::master')

@section('title')
    Manajemen Obat
    @endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <div class="table-responsive-sm">
                @if($obat->userCanCreate(Auth::user()))
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahObat">Daftarkan Obat Baru</button>
                @endif
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Satuan Pemakaian</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($obats as $obat)
                        <tr>
                            <td>{{ ucwords($obat->nama) }}</td>
                            <td>{{ ucfirst($obat->tipe_obat) }}</td>
                            <td>{{ $obat->satuan }}</td>
                            <td>{{ $obat->harga }}</td>
                            @if($obat->userCanUpdate(Auth::user()))
                            <td><button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-nama="{{ $obat->nama }}" data-harga="{{ $obat->harga }}" data-tipe="{{ $obat->tipe_obat }}" data-satuan="{{ $obat->satuan }}" data-target="#modalUbahObat">Ubah</button></td>
                                @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
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

                    <div class="form-group">
                        {{ Form::label('satuan', 'Satuan Pemakaian', ['class' => 'control-label']) }}
                        <br>
                        {{ Form::select('satuan', ['g' => 'Gram', 'mg' => 'Miligram', 'ml' => 'Mililiter'], null, ['class' => 'form-control']) }}
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

                    <div class="form-group">
                        {{ Form::label('satuan', 'Satuan Pemakaian', ['class' => 'control-label']) }}
                        <br>
                        {{ Form::select('satuan', ['g' => 'Gram', 'mg' => 'Miligram', 'ml' => 'Mililiter'], null, ['class' => 'form-control']) }}
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
                $("#modalUbahObat").find('#satuan').val($(e.relatedTarget).data('satuan')).change();
            });
        });
    </script>
    @include('obat::attribute.nav')
    @endsection
