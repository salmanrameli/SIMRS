@extends('layouttemplate::master')

@section('title')
    Catatan Harian Perawatan Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="float-right"><a href="{{ route('catatan_harian_perawatan.create', $pasien->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                    <h4>Catatan Harian Perawatan: {{ $pasien->nama }}</h4>
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
                            <tr>
                                <th>Tanggal Masuk</th>
                                <td style="padding-left: 10px">: {{ date("d F Y", strtotime($tanggal_masuk)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tanggal & Jam</th>
                        <th>Asuhan Keperawatan (SOAP)</th>
                        <th>Pengisi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($catatans as $catatan)
                        <tr>
                            <td style="min-width: 190px">{{ date("d F Y", strtotime($catatan->tanggal_keterangan)) }} – {{ $catatan->jam }}</td>
                            <td class="text-justify">{{ $catatan->asuhan_keperawatan_soap }}</td>
                            <td class="text-justify">{{ $catatan->id_petugas }}</td>
                            <td><a href="{{ route('catatan_harian_perawatan.edit', [$catatan->id_pasien, $catatan->id]) }}" class="btn btn-outline-warning">Ubah</a></td>
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
