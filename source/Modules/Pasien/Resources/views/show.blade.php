@extends('layouttemplate::pages-alt')

@section('title')
    Detail Pasien {{ $pasien->nama }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <h3>{{ ucfirst($pasien->nama) }}</h3>
            &nbsp;
            <table class="table">
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
                        <td>{{ $pasien->tanggal_lahir }}</td>
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
        </div>
    </div>
@endsection
