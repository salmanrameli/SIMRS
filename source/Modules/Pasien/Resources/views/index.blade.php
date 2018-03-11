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
                            <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
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
                                    <th>KTP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th></th>
                                </tr>
                                @foreach($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $pasien->ktp }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td><a href="{{ route('ranap.pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Lihat</a></td>
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

