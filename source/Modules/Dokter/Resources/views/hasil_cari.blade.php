@extends('layouttemplate::master')

@section('title')
    Hasil Pencarian: {{ $query }}
    @endsection

@section('content')
    <div class="card card-body">
        <form class="form-inline" action="{{ route('dokter.cari') }}" method="get">
            <label for="cari" class="control-label">Cari Dokter: </label>
            &nbsp;&nbsp;
            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
            <div class="d-none d-sm-block">
                &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Dokter</button>
            </div>

            <div class="d-sm-none">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Dokter</button>
            </div>
        </form>
    </div>

    <div class="card card-body">
        <div class="table-responsive-sm">
            <div class="row">
                <div class="col-md-12">
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
                        @foreach($dokters as $dokter)
                            <tr>
                                <td>{{ $dokter->nama }}</td>
                                <td class="d-none d-md-block">{{ $dokter->alamat }}</td>
                                <td>{{ $dokter->telepon }}</td>
                                <td class="d-none d-lg-block">
                                    <div class="btn-group">
                                        <a href="{{ route('dokter.show', ['id' => $dokter->id]) }}" class="btn btn-outline-info">Detail...</a>
                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('dokter.edit', ['id' => $dokter->id]) }}">Ubah</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-lg-none">
                                    <div class="btn-group">
                                        <a href="{{ route('dokter.show', ['id' => $dokter->id]) }}" class="btn btn-sm btn-outline-info">Detail...</a>
                                        <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('dokter.edit', ['id' => $dokter->id]) }}">Ubah</a>
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
    @endsection

@section('script')
    @include('dokter::attribute.nav')
    @endsection