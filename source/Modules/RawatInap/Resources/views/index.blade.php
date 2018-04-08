@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <br>
                <a href="{{ route('ranap.pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
                <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary">Daftarkan Rawat Inap Baru</a>
                <a href="{{ route('ranap.pasien.index') }}" class="btn btn-outline-info" style="margin-left: 10px">Lihat Semua Pasien</a>
                <br>
                <br>
                <div style="max-height: 500px; overflow: auto">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Nomor Kamar</th>
                            <th>Dokter Penanggung Jawab</th>
                            <th>Tanggal Masuk</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $pasien->pasien->nama }}</td>
                                <td>{{ $pasien->nama_kamar }}</td>
                                <td>{{ $pasien->dokter->nama }}</td>
                                <td>{{ date("d F Y", strtotime($pasien->tanggal_masuk)) }}</td>
                                <th>
                                    <a href="{{ route('ranap.show', $pasien->id) }}" class="btn btn-outline-info btn-sm float-right" style="margin-left: 5px">Detail...</a>
                                    @if(Auth::user()->jabatan_id == 3)
                                        <a href="{{ route('perjalanan_penyakit.index', $pasien->pasien->id) }}" class="btn btn-outline-info btn-sm float-right">Perjalanan Penyakit Pasien</a>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
