@extends('layouttemplate::pages')

@section('title')
    Perjalanan Penyakit Pasien
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Perjalanan Penyakit: {{ $pasien->nama }}</h4>
                    <br>
                    <p>Jenis Kelamin: {{ ucfirst($pasien->jenkel) }}</p>
                    <p id="umur">Umur: </p>
                    <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                    <a href="{{ route('perjalanan_penyakit.create', $pasien->id) }}" class="btn btn-outline-primary">Buat Catatan Baru</a>
                    <br><br>
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
    @endsection