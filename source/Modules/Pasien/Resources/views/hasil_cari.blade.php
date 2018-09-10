@extends('layouttemplate::master')

@section('title')
    Hasil pencarian: {{ $query }}
@endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                <label for="cari" class="control-label">Cari Pasien: </label>
                &nbsp;&nbsp;
                <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                <div class="d-none d-sm-block">
                    &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>

                </div>

                <div class="d-sm-none">
                    <br>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-body">
        <div class="table-responsive-sm">
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tbody>
                            <tr>
                                <th class="w-100 hidden"></th>
                                <td class="w-100 hidden"></td>
                            </tr>
                        </tbody>
                    </table>
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
                        @foreach($results as $result)
                            <tr>
                                <td>{{ ucwords($result->nama) }}</td>
                                <td class="d-none d-md-block">{{ ucwords($result->alamat) }}</td>
                                <td>{{ ucwords($result->telepon) }}</td>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('pasien::attribute.nav')
@endsection