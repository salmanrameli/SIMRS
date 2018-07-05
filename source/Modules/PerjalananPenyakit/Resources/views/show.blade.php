@extends('layouttemplate::master')

@section('title')
    Perjalanan Penyakit Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs small">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}">Perjalanan Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}">Perintah Dokter dan Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}">Catatan Harian dan Perawatan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">
                        @if(Auth::user()->jabatan_id == 4)
                            <div class="float-right"><a href="{{ route('perjalanan_penyakit.create', $ranap->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                        @endif

                        <h4>Perjalanan Penyakit: {{ $ranap->pasien->nama }}</h4>
                        <hr>
                        <div class="col-md-12">
                            <table>
                                <tbody class="small">
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td style="padding-left: 10px">: {{ ucfirst($ranap->pasien->jenkel) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Umur</th>
                                        <td id="umur" style="padding-left: 10px"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Masuk</th>
                                        <td style="padding-left: 10px">: {{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diagnosa Awal</th>
                                        <td style="padding-left: 10px">: {{ ucfirst($ranap->diagnosa_awal) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p id="tanggal_lahir" hidden>{{ $ranap->pasien->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <table class="table small">
                        <thead>
                            <tr>
                                <th>Perjalanan Penyakit</th>
                                <th>Perintah Dokter dan Pengobatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-justify">
                                    <b>Dibuat tanggal: {{ date("d F Y", strtotime($perjalanan->tanggal_keterangan)) }}</b><br>
                                    @if(strtotime($perjalanan->created_at) == strtotime($perjalanan->updated_at))
                                        <b>Diubah tanggal: –</b>
                                    @else
                                        <b>Diubah tanggal: {{ date("d F Y", strtotime($perjalanan->updated_at)) }}</b>
                                    @endif
                                    <hr>
                                    <label><b>Subjektif</b></label>
                                    <p>{!! $perjalanan->subjektif !!}</p>
                                    <label><b>Objektif</b></label>
                                    <p>{!! $perjalanan->objektif !!}</p>
                                    <label><b>Assessment</b></label>
                                    <p>{!! $perjalanan->assessment !!}</p>
                                </td>
                                <td class="text-justify">
                                    <label><b>Planning</b></label>
                                    <p>{!! $perjalanan->planning_perintah_dokter_dan_pengobatan !!} &nbsp;<a href="{{ route('perintah_dokter_dan_pengobatan.show', [$ranap->id, $perjalanan->id]) }}">Pengobatan...</a></p>
                                    @if(Auth::user()->jabatan_id ==4)
                                        <hr>
                                        <a href="{{ route('perjalanan_penyakit.edit', [$ranap->id, $perjalanan->id]) }}" class="btn btn-sm btn-warning float-right">Ubah</a>
                                        @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var lahir = new Date($('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#umur').append(": " + umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
