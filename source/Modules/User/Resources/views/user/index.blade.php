@extends('layouttemplate::master')

@section('title')
    Manajemen Staff & Jabatan
@endsection

@section('content')
    <div class="card card-body">
        <form class="form-inline" action="{{ route('user.cari') }}" method="get">
            <label for="cari" class="control-label">Cari Staff: </label>
            &nbsp;&nbsp;
            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">

            <div class="d-none d-sm-block">
                &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
            </div>

            <div class="d-sm-none">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
            </div>
        </form>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-staff" data-toggle="tab" href="#nav-staff" role="tab" aria-controls="nav-staff" aria-selected="true">Staff</a>
            <a class="nav-item nav-link" id="nav-jabatan" data-toggle="tab" href="#nav-jabatan" role="tab" aria-controls="nav-jabatan" aria-selected="false">Jabatan</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-staff" role="tabpanel" aria-labelledby="nav-staff">
            <div class="card card-body">
                <div class="table-responsive-sm">
                    @if(Auth::user()->userCanCreate())
                    <a class="btn btn-outline-primary" href="{{ route('user.create') }}">Daftarkan Staff Baru</a>
                    @endif
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="d-none d-md-block">ID</th>
                                <th>Nama</th>
                                <th class="d-none d-md-block">Telepon</th>
                                <th>Jabatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="d-none d-md-block">{{ $user->id_user }}</td>
                                <td>{{ $user->nama }}</td>
                                <td class="d-none d-md-block">{{ $user->telepon }}</td>
                                <td>{{ ucfirst($user->jabatan->nama ) }}</td>
                                <td class="d-none d-lg-block">
                                    <div class="btn-group">
                                        @if(Auth::user()->userCanRead())
                                        <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-info">Detail...</a>
                                        @endif
                                        @if(Auth::user()->userCanUpdate())
                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('user.edit', ['id' => $user->id]) }}">Ubah</a>
                                        </div>
                                            @endif
                                    </div>
                                </td>
                                <td class="d-lg-none">
                                    <div class="btn-group">
                                        @if(Auth::user()->userCanRead())
                                        <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-info">Detail..</a>
                                        @endif
                                        @if(Auth::user()->userCanUpdate())
                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('user.edit', ['id' => $user->id]) }}">Ubah</a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end float-left">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-jabatan" role="tabpanel" aria-labelledby="nav-jabatan">
            <div class="card card-body">
                <div class="col-md-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahJabatan">Daftarkan Jabatan Baru</button>
                    <br><br>
                    <table class="table">
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
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-id-jabatan="{{ $jabatan->id }}" data-nama-jabatan="{{ $jabatan->nama }}" data-target="#modalUbahJabatan">Ubah</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

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
    @include('user::attribute.nav')
@endsection
