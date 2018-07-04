@extends('layouttemplate::master')

@section('title')
    Perintah Dokter dan Pengobatan
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs small">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perjalanan_penyakit.index', $ranap->id) }}">Perjalanan Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}">Perintah Dokter dan Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}">Catatan Harian dan Perawatan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">
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
                                <th>Terapi dan Rencana Tindakan</th>
                                <th>Catatan Perawat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-justify">
                                    <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</b><br>
                                    @if(strtotime($perintah->perjalanan_penyakit->tanggal_keterangan) == strtotime($perintah->perjalanan_penyakit->updated_at))
                                        <b>Diubah tanggal: –</b>
                                    @else
                                        <b>Diubah tanggal: {{ date("d F Y", strtotime($perintah->updated_at)) }}</b>
                                    @endif
                                    <hr>
                                    <p>{!! $perintah->perjalanan_penyakit->planning_perintah_dokter_dan_pengobatan !!} &nbsp;<a href="{{ route('perjalanan_penyakit.show', [$ranap->id, $perintah->id_perjalanan_penyakit]) }}">Perjalanan Penyakit...</a></p>
                                </td>
                                <td class="text-justify">
                                    <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</b><br>
                                    @if(strtotime($perintah->created_at) == strtotime($perintah->updated_at))
                                        <b>Diubah tanggal: –</b>
                                    @else
                                        <b>Diubah tanggal: {{ date("d F Y", strtotime($perintah->updated_at)) }}</b>
                                    @endif
                                    <hr>

                                    {!! $perintah->catatan_perawat !!}

                                    @if(Auth::user()->jabatan_id == 3)
                                        @if($perintah->perjalanan_penyakit->planning_perintah_dokter_dan_pengobatan != null && $perintah->catatan_perawat != null)
                                            <hr>
                                            <div class="btn-group float-right">
                                                <a href="{{ route('perintah_dokter_dan_pengobatan.edit', [$ranap->id, $perintah->id]) }}" class="btn btn-warning">Ubah</a>
                                            </div>
                                        @else
                                            <div class="btn-group float-right">
                                                <a href="{{ route('perintah_dokter_dan_pengobatan.create', [$ranap->id, $perintah->id]) }}" class="btn btn-outline-primary">Catatan Baru</a>
                                            </div>
                                        @endif
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