@extends('layouttemplate::pages')


@section('content')
    <div class="page-header">
        <h3>Manajemen Pasien</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                            <label for="cari" class="control-label">Cari Pasien: </label>
                            &nbsp;&nbsp;
                            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                        <br>
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
                                    <td>{{ $pasien->telepon }}</td>
                                    <td><a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Lihat</a></td>
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
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien')
@endsection
