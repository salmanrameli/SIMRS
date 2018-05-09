@extends('layouttemplate::master')

@section('title')
    Manajemen Obat
    @endsection

@section('content')
    <div class="page-header">
        <h3>Manajemen Obat</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('obat.create') }}" class="btn btn-outline-primary">Daftarkan Obat Baru</a>
                        <br><br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($obats as $obat)
                                <tr>
                                    <td>{{ ucfirst($obat->nama) }}</td>
                                    <td>{{ $obat->harga }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('obat.show', ['id' => $obat->id]) }}" class="btn btn-outline-info">Detail...</a>
                                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('obat.edit', ['id' => $obat->id]) }}">Ubah</a>
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
    </div>
@stop

@section('script')
    @include('layouttemplate::attributes.obat')
    @endsection
