@extends('layouttemplate::master')

@section('title')
    Manajemen Pasien
@endsection

@section('content')
    @if(Auth::user()->jabatan_id == 1)
    <div class="page-header">
        <h3>Manajemen Pasien</h3>
        <br>
    </div>
    @endif
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                            <label for="cari" class="control-label">Cari Pasien: </label>
                            &nbsp;&nbsp;
                            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Cari Pasien</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                        <br>
                        <br>
                        <nav>
                            <ul class="pagination justify-content-end float-left">
                                {{ $pasiens->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th></th>
                            </tr>
                            @foreach($pasiens as $pasien)
                                <tr>
                                    <td>{{ ucwords($pasien->nama) }}</td>
                                    <td>{{ ucwords($pasien->alamat) }}</td>
                                    <td>{{ $pasien->telepon }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Rincian Pasien</a>
                                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                                                    <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $pasien->id]) }}">Ubah</a>
                                                    @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination justify-content-end float-left">
                            {{ $pasiens->links('vendor.pagination.bootstrap-4') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(Auth::user()->jabatan_id == 1)
        @include('layouttemplate::attributes.pasien')
    @else
        @include('layouttemplate::attributes.pasien_ranap')
    @endif
@endsection
