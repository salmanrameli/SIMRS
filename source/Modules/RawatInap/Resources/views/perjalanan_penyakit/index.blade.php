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
                    <hr>
                    <div class="col-md-12">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td style="padding-left: 10px">: {{ ucfirst($pasien->jenkel) }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td id="umur" style="padding-left: 10px"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Perjalanan Penyakit</th>
                            <th>Perintah Dokter & Pengobatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perjalanans as $perjalanan)
                            <tr>
                                <td>{{ date("d F Y", strtotime($perjalanan->tanggal_keterangan)) }}</td>
                                <td class="text-justify">{{ $perjalanan->perjalanan_penyakit }}</td>
                                <td class="text-justify">{{ $perjalanan->perintah_dokter_dan_pengobatan }}</td>
                                <td><a href="{{ route('perjalanan_penyakit.edit', [$perjalanan->id_pasien, $perjalanan->id]) }}" class="btn btn-outline-warning">Ubah</a></td>
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
        $('#umur').append(": " + umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
    @endsection
