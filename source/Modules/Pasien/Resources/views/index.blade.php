@extends('layouttemplate::master')

@section('title')
    @if(Auth::user()->jabatan_id == 1)
        Manajemen Pasien
    @else
        Pasien
    @endif
@endsection

@section('content')
    <div class="card card-body">
        <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
            <label for="cari" class="control-label">Cari Pasien: </label>
            &nbsp;&nbsp;
            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">

            <div class="d-none d-sm-block">
                &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Pasien</button>

            </div>

            <div class="d-sm-none">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Pasien</button>
            </div>
        </form>
    </div>

    <div class="card card-body">
        <div class="table-responsive-sm">
            @if($pasien->userCanCreate(Auth::user()))
            <a href="{{ route('pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
            <hr>
            @endif
            <nav>
                <ul class="pagination justify-content-end float-left">
                    {{ $pasiens->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </nav>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th class="d-none d-md-block">Alamat</th>
                        <th>Telepon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pasiens as $pasien)
                    <tr>
                        <td>{{ ucwords($pasien->nama) }}</td>
                        <td class="d-none d-md-block">{{ ucwords($pasien->alamat) }}</td>
                        <td>{{ $pasien->telepon }}</td>
                        <td class="d-none d-lg-block">
                            <div class="btn-group">
                                @if($pasien->userCanRead(Auth::user()))
                                <a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Rincian Pasien</a>
                                @endif
                                @if($pasien->userCanUpdate(Auth::user()))
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                                        <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $pasien->id]) }}">Ubah</a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="d-lg-none">
                            <div class="btn-group">
                                @if($pasien->userCanRead(Auth::user()))
                                <a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-sm btn-outline-info">Rincian<br>Pasien</a>
                                @endif()
                                @if($pasien->userCanUpdate(Auth::user()))
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                                        <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $pasien->id]) }}">Ubah</a>
                                    @endif
                                </div>
                                    @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination justify-content-end float-left">
                {{ $pasiens->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </div>
    </div>
@endsection

@section('script')
    @include('pasien::attribute.nav')
@endsection
