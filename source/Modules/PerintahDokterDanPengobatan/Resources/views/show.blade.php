@extends('layouttemplate::master-ranap')

@section('title')
    Perintah Dokter dan Pengobatan
    @endsection

@section('content')
    <div class="card-body">
        <div class="col-md-12">
            <div class="page-header">
                <h4>Perintah Dokter dan Pengobatan Pasien: {{ $perintah->perjalanan_penyakit->rawat_inap->pasien->nama }}</h4>
                <hr>
                <div class="col-md-12">
                    <table>
                        <tbody class="small">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td style="padding-left: 10px">: {{ ucfirst($perintah->perjalanan_penyakit->rawat_inap->pasien->jenkel) }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td id="umur" style="padding-left: 10px"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td style="padding-left: 10px">: {{ date("d F Y", strtotime($perintah->perjalanan_penyakit->rawat_inap->tanggal_masuk)) }}</td>
                        </tr>
                        <tr>
                            <th>Diagnosa Awal</th>
                            <td style="padding-left: 10px">: {{ ucfirst($perintah->perjalanan_penyakit->rawat_inap->diagnosa_awal) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <p id="tanggal_lahir" hidden>{{ $perintah->perjalanan_penyakit->rawat_inap->pasien->tanggal_lahir }}</p>
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
                        <td class="text-justify w-50">
                            <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->perjalanan_penyakit->tanggal_keterangan)) }}</b><br>
                            @if(strtotime($perintah->perjalanan_penyakit->tanggal_keterangan) == strtotime($perintah->perjalanan_penyakit->updated_at))
                                <b>Diubah tanggal: –</b>
                            @else
                                <b>Diubah tanggal: {{ date("d F Y", strtotime($perintah->updated_at)) }}</b>
                            @endif
                            <hr>
                            <p>{!! $perintah->perjalanan_penyakit->planning_perintah_dokter_dan_pengobatan !!} &nbsp;<a href="{{ route('perjalanan_penyakit.show', [$ranap->id, $perintah->id_perjalanan_penyakit]) }}">Perjalanan Penyakit...</a></p>
                        </td>
                        <td class="text-justify">
                            <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</b> oleh <b>{{ $perintah->user->nama }}</b><br>
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
                                        {{--<a href="{{ route('perintah_dokter_dan_pengobatan.edit', [$ranap->id, $perintah->id]) }}" class="btn btn-sm btn-warning">Ubah</a>--}}
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-perintah="{!! $perintah->perjalanan_penyakit->planning_perintah_dokter_dan_pengobatan !!}" data-catatan="{{ $perintah->catatan_perawat }}" data-target="#modalUbahCatatanPerintah">Ubah</button>
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

    <div class="modal fade" id="modalUbahCatatanPerintah" tabindex="-1" role="dialog" aria-labelledby="modalUbahCatatanPerintah" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahCatatanPerintah">Ubah Rincian Perintah Dokter dan Pengobatan Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="reset"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'PATCH', 'route' => ['perintah_dokter_dan_pengobatan.update']]) }}
                <div class="modal-body">
                    <div hidden>
                        <label for="id_ranap" class="control-label">ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}">
                    </div>

                    <div hidden>
                        <label for="id" class="control-label">ID Perintah:</label>
                        <input type="text" name="id" id="id" value="{{ $perintah->id }}">
                    </div>

                    <label><b>Terapi dan Rencana Tindakan:</b></label>
                    <p id="perintah"></p>
                    <hr>

                    <div class="form-group">
                        {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                        {{ Form::textarea('catatan_perawat', $perintah->catatan_perawat, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

    @endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#modalUbahCatatanPerintah').on("shown.bs.modal", function (e) {
                $("#modalUbahCatatanPerintah").find('#perintah').html($("<span />", { html: $(e.relatedTarget).data('perintah')}).text());
                $("#modalUbahCatatanPerintah").find('#catatan_perawat').htmlarea('html', $(e.relatedTarget).data('catatan'));
            });
        });
    </script>
    <script>
        var lahir = new Date($('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#umur').append(": " + umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.perintah_dokter')
    @endsection