@extends('layouttemplate::pages')

@section('title')
    Manajemen Dokter RS
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-body">
                <div class="col-md-12">
                    <a href="{{ route('dokter.create') }}" class="btn btn-outline-primary">Daftarkan Dokter Baru</a>
                    <br><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Spesialis</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dokters as $dokter)
                            <tr>
                                <td>{{ $dokter->nama }}</td>
                                <td>{{ $dokter->bidang_spesialis }}</td>
                                <td><a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-outline-info float-right">Lihat</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <div class="col-md-12">
                    <a href="{{ route('spesialis.create') }}" class="btn btn-outline-primary">Tambah Bidang Spesialis Dokter</a>
                    <br><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spesialiss as $spesialis)
                            <tr>
                                <td>{{ $spesialis->nama }}</td>
                                <td><a href="{{ route('spesialis.edit', $spesialis->id) }}" class="btn btn-outline-warning float-right">Ubah</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection
