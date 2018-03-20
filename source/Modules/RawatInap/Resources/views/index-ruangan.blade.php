@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
        <br>
        <div class="col-md-12">
            @foreach($lantais as $lantai)
                <div class="card">
                    <div class="card-header">
                        <h5>Lantai {{ $lantai }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($kamars as $kamar)
                                @if($kamar->nomor_lantai == $lantai)
                                    <div class="col-md-2">
                                        <div class="card card-body">
                                            <h6 class="text-center">Kamar {{ $kamar->nama_kamar }}</h6>
                                            <table class="table">
                                                <tbody class="small">
                                                <tr>
                                                    <th>Kapasitas</th>
                                                    <td>{{ $kamar->jumlah_maks_pasien }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Terisi</th>
                                                    @foreach($terisis as $terisi)
                                                        @if($terisi->nama_kamar == $kamar->nama_kamar)
                                                            <td>{{ $terisi->pasien_inap }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a href="{{ route('ranap.kamar.show', $kamar->nama_kamar) }}" class="btn btn-outline-info btn-sm">Detail...</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.denah')
@endsection