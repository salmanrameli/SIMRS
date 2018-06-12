@extends('layouttemplate::master')

@section('title')
    Detail Pasien: {{ $pasien->nama }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <h3>{{ ucfirst($pasien->nama) }}</h3>
                <br>
                <table class="table" id="table">
                    <tbody>
                    <tr>
                        <th class="w-25">KTP</th>
                        <td>{{ $pasien->ktp }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ ucfirst($pasien->jenkel) }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah/Suami</th>
                        <td>{{ ucfirst($pasien->nama_wali) }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ ucfirst($pasien->alamat) }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td id="tanggal_lahir">{{ date("d F Y", strtotime($pasien->tanggal_lahir)) }}</td>
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
                @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning float-left">Ubah Data Pasien</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.pasien')
    <script>
        var lahir = new Date($('#table').find('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#tanggal_lahir').append(" (" + umur + " tahun)");
    </script>
    @endsection
