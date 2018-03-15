@extends('layouttemplate::pages')

@section('content')
    <div class="page-header">
        <h3>Manajemen Bangunan</h3>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('lantai.create') }}" class="btn btn-outline-primary">Tambah Lantai Baru</a>
                        <a href="{{ route('kamar.create') }}" class="btn btn-outline-primary">Tambah Kamar Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                @foreach($lantais as $lantai)
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <h3>
                                    Lantai {{ $lantai->nomor_lantai }}
                                    <a href="{{ route('lantai.show', $lantai->id) }}" class="btn btn-outline-info float-right" style="margin-left: 5px">Lihat Detail</a>
                                    <a href="{{ route('lantai.edit', $lantai->id) }}" class="btn btn-outline-warning float-right">Ubah</a>
                                </h3>
                                @foreach($kamars as $kamar)
                                    @if($lantai->nomor_lantai == $kamar->nomor_lantai)
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="w-100" style="padding-right: 100px">Jumlah Kamar</th>
                                                    <td>{{ $kamar->total_kamar }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.bangunan')
    @endsection
