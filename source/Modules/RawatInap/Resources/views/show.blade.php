@extends('layouttemplate::master')

@section('title')
    Detail Rawat Inap
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <h4>Rawat Inap Pasien: {{ $ranap->pasien->nama }}</h4>
                    <br>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th class="w-25">Kamar</th>
                            <td>{{ $ranap->nama_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Dokter Penanggung Jawab</th>
                            <td>{{ $ranap->user->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>{{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('ranap.pasien.show', $ranap->pasien->id) }}" class="btn btn-outline-info">Data Pasien</a>

                @if(Auth::user()->jabatan_id == 3)
                    <a href="{{ route('perjalanan_penyakit.index', $ranap->pasien->id) }}" class="btn btn-outline-info">Perjalanan Penyakit Pasien</a>
                @endif

                <a href="{{ route('ranap.edit', $ranap->id) }}" class="btn btn-warning float-right">Ubah</a>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien_ranap')
    @endsection