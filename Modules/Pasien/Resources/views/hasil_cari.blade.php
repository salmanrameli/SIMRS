@extends('pasien::layouts.master')

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                <label for="cari" class="control-label">Cari Pasien: </label>
                &nbsp;&nbsp;
                <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                &nbsp;
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="card card-body">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->ktp }}</td>
                        <td>{{ $result->nama }}</td>
                        <td>{{ $result->alamat }}</td>
                        <td>{{ $result->telepon }}</td>
                        <td><a href="{{ route('pasien.show', ['id' => $result->id]) }}" class="btn btn-outline-info">Lihat</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection