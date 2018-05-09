@extends('layouttemplate::master')

@section('title')
    Detail Obat
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <h3>Detail Obat: {{ ucfirst($obat->nama) }}</h3>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>{{ ucfirst($obat->nama) }}</td>
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