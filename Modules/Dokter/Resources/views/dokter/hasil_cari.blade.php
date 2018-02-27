@extends('layouttemplate::pages')

@section('title')
    Hasil Pencarian: {{ $query }}
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('dokter.cari') }}" method="get">
                    <label for="cari" class="control-label">Cari Dokter: </label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
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
                            @foreach($dokters as $dokter)
                                <tr>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->alamat }}</td>
                                    <td>{{ $dokter->telepon }}</td>
                                    <td><a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-outline-info float-right">Lihat</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection