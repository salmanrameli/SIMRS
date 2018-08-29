@extends('layouttemplate::master-ranap-mobile')

@section('title')
    Revisi Catatan Harian dan Perawatan
    @endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            <h4>Revisi Catatan Harian dan Perawatan {{ ucwords($ranap->pasien->nama) }}</h4>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Asuhan Keperawatan (SOAP)</th>
                </tr>
            </thead>
            <tbody>
            @if(!empty($revisis))
                @foreach($revisis as $revisi)
                    <tr>
                        <td class="text-justify">
                            <b>Diubah tanggal: {{ date("d F Y", strtotime($revisi->updated_at)) }}</b>
                            <hr>
                            <p>{!! $revisi->asuhan_keperawatan_soap !!}</p>
                            <hr>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.catatan_harian')
    @endsection