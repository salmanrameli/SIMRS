@extends('layouttemplate::master')

@section('title')
    Rincian Pasien: {{ $pasien->nama }}
@endsection

@section('content')
    <div class="card card-body">
        <table class="table table-striped" id="table">
            <tbody>
                <tr>
                    <th class="w-25">ID Penduduk Pasien</th>
                    <td>{{ $pasien->id_penduduk_pasien }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ ucwords($pasien->jenkel) }}</td>
                </tr>
                <tr>
                    <th>Nama Ayah/Suami</th>
                    <td>{{ ucwords($pasien->nama_wali) }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ ucwords($pasien->alamat) }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td id="tanggal_lahir"></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $pasien->telepon }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ ucfirst($pasien->pekerjaan) }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ ucfirst($pasien->agama) }}</td>
                </tr>
                <tr>
                    <th>Golongan Darah</th>
                    <td>{{ $pasien->golongan_darah }}</td>
                </tr>
            </tbody>
        </table>
        <p id="tgl_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
        @if($pasien->userCanUpdate(Auth::user()))
            <div class="col-md-12">
                <div class="row">
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning float-left">Ubah Data Pasien</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    @include('pasien::attribute.nav')
    <script>
        var date = new Date($('#tgl_lahir').text());
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = date.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#tanggal_lahir').append(" " + date.toLocaleDateString('id', options) + " (" + umur + " tahun)");
    </script>
    @endsection
