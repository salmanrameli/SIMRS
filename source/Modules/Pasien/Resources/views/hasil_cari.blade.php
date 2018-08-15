@extends('layouttemplate::master')

@section('title')
    Hasil pencarian: {{ $query }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="d-none d-sm-block">
            <div class="card card-body">
                <div class="col-md-12">
                    <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                        <label for="cari" class="control-label">Cari Pasien: </label>
                        &nbsp;&nbsp;
                        <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                        &nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="d-none d-sm-block">
            <div class="card card-body">
                <div class="page-header">
                    <h3>Hasil pencarian untuk: {{ ucwords($query) }}</h3>
                    <br>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <th class="w-100 hidden"></th>
                            <td class="w-100 hidden"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ ucwords($result->nama) }}</td>
                            <td>{{ ucwords($result->alamat) }}</td>
                            <td>{{ ucwords($result->telepon) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('pasien.show', ['id' => $result->id]) }}" class="btn btn-outline-info">Rincian Pasien</a>
                                    <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $result->id]) }}">Ubah</a>
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
@endsection

@section('content-mobile')
    <div class="d-block d-sm-none">
        <div class="card card-body">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                    <label for="cari" class="control-label">Cari Pasien: </label>
                    <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                    <br><br><br>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-block d-sm-none">
        <div class="card card-body">
            <div class="page-header">
                <h3>Hasil pencarian untuk: {{ ucwords($query) }}</h3>
                <br>
            </div>
            <table>
                <tbody>
                    <tr>
                        <th class="w-100 hidden"></th>
                        <td class="w-100 hidden"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table small">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ ucwords($result->nama) }}</td>
                        <td>{{ ucwords($result->alamat) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('pasien.show', ['id' => $result->id]) }}" class="btn btn-sm btn-outline-info">Rincian<br>Pasien</a>
                                <button type="button" class="btn btn-sm btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $result->id]) }}">Ubah</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien')
@endsection