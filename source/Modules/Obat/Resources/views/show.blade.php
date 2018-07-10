@extends('layouttemplate::master')

@section('title')
    Detail Obat
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                    <a class="btn btn-warning float-right" href="{{ route('obat.edit', ['id' => $obat->id]) }}">Ubah</a>
                @endif
                <h3>Detail Obat: {{ ucfirst($obat->nama) }}</h3>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>{{ ucfirst($obat->nama) }}</td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td>{{ ucfirst($obat->tipe_obat) }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>{{ $obat->harga }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection

@section('script')
    @include('layouttemplate::attributes.obat')
    @endsection