@extends('layouttemplate::pages-alt')

@section('title')
    Daftar Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="row">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" action="{{ route('ranap.pasien.cari') }}" method="get">
                                <label for="cari" class="control-label">Cari Pasien: </label>
                                &nbsp;&nbsp;
                                <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">
                                &nbsp;
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
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
                                        <td>{{ ucwords($pasien->telepon) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Detail...</a>
                                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('pasien.edit', ['id' => $pasien->id]) }}">Ubah</a>
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
    </div>
@endsection

