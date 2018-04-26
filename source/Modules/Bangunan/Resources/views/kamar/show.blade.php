@extends('layouttemplate::pages')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <a href="{{ route('kamar.edit', ['id' => $kamar->id]) }}" class="btn btn-warning float-right">Ubah Detail Ruang</a>
                            <h2>Ruang {{ $kamar->nama_kamar }}</h2>
                            <br>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="padding-right: 150px">Lokasi:</th>
                                <td class="w-100" style="padding-left: 70px">Lantai {{ $kamar->nomor_lantai }} </td>
                            </tr>
                            <tr>
                                <th>Jumlah Maksimal Penghuni:</th>
                                <td style="padding-left: 70px">{{ $kamar->jumlah_maks_pasien }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
@endsection