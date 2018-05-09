@extends('layouttemplate::master')

@section('title')
    Detail Alat Kesehatan
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                @if(Auth::user()->jabatan_id == 1 || Auth::user()->jabatan_id == 2)
                    <a class="btn btn-warning float-right" href="{{ route('alat_kesehatan.edit', ['id' => $alkes->id]) }}">Ubah</a>
                @endif
                <h3>Detail Alat Kesehatan: {{ ucfirst($alkes->nama) }}</h3>
                <br>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ ucfirst($alkes->nama) }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>{{ $alkes->harga }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('layouttemplate::attributes.alkes')
@endsection