@extends('layouttemplate::master')

@section('title')
    Detail Ruang
@endsection()

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <div class="row float-right">
                                <a href="{{ route('kamar.edit', ['id' => $kamar->id]) }}" class="btn btn-warning float-right">Ubah Detail Ruang</a>

                                {{ Form::open(['route' => ['kamar.delete', $kamar->id], 'method' => 'delete']) }}
                                    <button type="submit" class="btn btn-danger" style="margin-left: 10px; margin-right: 10px" onclick="return confirm('Apakah anda yakin menghapus kamar ini?')">Hapus</button>
                                {{ Form::close() }}
                            </div>
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