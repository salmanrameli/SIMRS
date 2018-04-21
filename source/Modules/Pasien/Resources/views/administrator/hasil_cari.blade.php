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
                &nbsp;
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="card card-body">
        <div class="col-md-12">
            <div class="page-header">
                <h3>Hasil pencarian untuk: {{ $query }}</h3>
                <br>
            </div>
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
                        <td><a href="{{ route('pasien.show', ['id' => $result->id]) }}" class="btn btn-sm btn-outline-info">Detail...</a></td>
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