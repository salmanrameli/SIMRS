@extends('layouttemplate::pages')

@section('title')
    Perjalanan Penyakit Pasien
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="float-right"><a href="{{ route('perjalanan_penyakit.create', $pasien->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                    <h4>Perjalanan Penyakit: {{ $pasien->nama }}</h4>
                    <p>Jenis Kelamin: {{ ucfirst($pasien->jenkel) }}</p>
                    <p id="umur">Umur: </p>
                    <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Perjalanan Penyakit</th>
                            <th>Perintah Dokter & Pengobatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perjalanans as $perjalanan)
                            <tr>
                                <td>{{ date("d F Y", strtotime($perjalanan->tanggal_keterangan)) }}</td>
                                <td>{{ $perjalanan->perjalanan_penyakit }}</td>
                                <td>{{ $perjalanan->perintah_dokter_dan_pengobatan }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        var lahir = new Date($('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#umur').append(umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
    @endsection
