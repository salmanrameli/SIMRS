@extends('layouttemplate::master')

@section('title')
    Manajemen Alat Kesehatan
    @endsection

@section('content')
    <div class="page-header">
        <h3>Manajemen Alat Kesehatan</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
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
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alkess as $alkes)
                                <tr>
                                    <td class="w-50">{{ ucfirst($alkes->nama) }}</td>
                                    <td class="w-50">{{ $alkes->harga }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('alat_kesehatan.show', ['id' => $alkes->id]) }}" class="btn btn-outline-info">Detail...</a>
                                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('alat_kesehatan.edit', ['id' => $alkes->id]) }}">Ubah</a>
                                            </div>
                                        </div>
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
@endsection

@section('script')
    @include('layouttemplate::attributes.alkes')
@endsection
