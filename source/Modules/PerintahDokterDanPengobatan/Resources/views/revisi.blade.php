@extends('layouttemplate::master-ranap')

@section('title')
    Revisi Catatan Perintah Dokter dan Pengobatan
    @endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            <h3>Revisi Catatan Perintah Dokter dan Pengobatan {{ ucwords($ranap->pasien->nama) }}</h3>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Catatan Perawat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($revisis as $revisi)
                <tr>
                    <td class="text-justify">
                        <b>Diubah tanggal: {{ date("d F Y", strtotime($revisi->updated_at)) }}</b>
                        <hr>
                        {!! $revisi->catatan_perawat or ''!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection

@section('content-mobile')
    <div class="card-body">
        <div class="page-header">
            <h4>Revisi Catatan Perintah Dokter dan Pengobatan {{ ucwords($ranap->pasien->nama) }}</h4>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Catatan Perawat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($revisis as $revisi)
                <tr>
                    <td class="text-justify">
                        <b>Diubah tanggal: {{ date("d F Y", strtotime($revisi->updated_at)) }}</b>
                        <hr>
                        {!! $revisi->catatan_perawat or ''!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.perintah_dokter')
    @endsection