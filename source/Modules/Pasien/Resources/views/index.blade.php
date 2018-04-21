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
                                        <td><a href="{{ route('ranap.pasien.show', ['id' => $pasien->id]) }}" class="btn btn-sm btn-outline-info">Detail...</a></td>
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

