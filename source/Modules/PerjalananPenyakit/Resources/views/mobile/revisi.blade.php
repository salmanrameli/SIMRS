@extends('layouttemplate::master-ranap-mobile')

@section('title')
    Revisi Catatan Perjalanan Penyakit
    @endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            <h4>Revisi Catatan Perjalanan Penyakit {{ ucwords($ranap->pasien->nama) }}</h4>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Perjalanan Penyakit</th>
                    <th>Perintah Dokter dan Pengobatan</th>
                </tr>
            </thead>
            <tbody>
            @foreach($revisis as $revisi)
                <tr>
                    <td class="text-justify w-50">
                        <b>Diubah tanggal: {{ date("d F Y", strtotime($revisi->updated_at)) }}</b>
                        <hr>
                        <label><b>Subjektif</b></label>
                        <p>{!! $revisi->subjektif !!}</p>
                        <label><b>Objektif</b></label>
                        <p>{!! $revisi->objektif !!}</p>
                        <label><b>Assessment</b></label>
                        <p>{!! $revisi->assessment !!}</p>
                    </td>
                    <td class="text-justify">
                        <label><b>Planning</b></label>
                        <p>{!! $revisi->planning_perintah_dokter_dan_pengobatan !!}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection

@section('script')
    @include('perjalananpenyakit::attribute.nav')
@endsection