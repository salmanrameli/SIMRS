@extends('layouttemplate::master')

@section('title')
    Hasil Pencarian: {{ $query }}
@endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <form class="form-inline" action="{{ route('user.cari') }}" method="get">
                <label for="cari" class="control-label">Cari Staff: </label>
                &nbsp;&nbsp;
                <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                &nbsp;
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="card card-body">
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
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->alamat }}</td>
                    <td>{{ $result->telepon }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.show', ['id' => $result->id]) }}" class="btn btn-outline-info">Detail...</a>
                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('user.edit', ['id' => $result->id]) }}">Ubah</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.user')
@endsection