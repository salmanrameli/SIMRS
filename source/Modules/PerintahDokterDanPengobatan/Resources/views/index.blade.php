@extends('layouttemplate::master-ranap')

@section('title')
    Perintah Dokter dan Pengobatan Pasien
@endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            <h4>Perintah Dokter dan Pengobatan: {{ ucwords($ranap->pasien->nama) }}</h4>
            <hr>
            <div class="col-md-12">
                <table>
                    <tbody class="small">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td style="padding-left: 10px">: {{ ucwords($ranap->pasien->jenkel) }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td id="umur" style="padding-left: 10px"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td style="padding-left: 10px" id="tanggal_masuk">:</td>
                        </tr>
                        <tr>
                            <th>Diagnosa Awal</th>
                            <td style="padding-left: 10px">: {{ ucfirst($ranap->diagnosa_awal) }}</td>
                        </tr>
                        <tr>
                            <th>DPJP</th>
                            <td style="padding-left: 10px">: {{ ucwords($ranap->user->nama) }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p id="tanggal_lahir" hidden>{{ $ranap->pasien->tanggal_lahir }}</p>
                <p id="tgl_masuk" hidden>{{ $ranap->tanggal_masuk }}</p>
                <br>
            </div>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Terapi dan Rencana Tindakan</th>
                    <th>Catatan Perawat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perintahs as $perintah)
                <tr>
                    <td class="text-justify w-50">
                        <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</b><br>
                        @if(strtotime($perintah->created_at) == strtotime($perintah->updated_at))
                            <b>Diubah tanggal: –</b>
                        @else
                            <b>Diubah tanggal: {{ date("d F Y", strtotime($perintah->updated_at)) }}</b>
                        @endif
                        <hr>

                        <p>{!! $perintah->planning_perintah_dokter_dan_pengobatan !!} &nbsp;<a href="{{ route('perjalanan_penyakit.show', [$ranap->id, $perintah->id]) }}">Perjalanan Penyakit...</a></p>
                    </td>
                    <td class="text-justify">
                        @if(!empty($perintah->perintah_dokter_dan_pengobatan))
                            <b>Dibuat tanggal: {{ date("d F Y", strtotime($perintah->perintah_dokter_dan_pengobatan->tanggal_keterangan)) }}</b> oleh <b>{{ $perintah->perintah_dokter_dan_pengobatan->user->nama }}</b><br>
                            @if(strtotime($perintah->perintah_dokter_dan_pengobatan->created_at) == strtotime($perintah->perintah_dokter_dan_pengobatan->updated_at))
                                <b>Diubah tanggal: –</b>
                            @else
                                <b>Diubah tanggal: {{ date("d F Y", strtotime($perintah->perintah_dokter_dan_pengobatan->updated_at)) }}</b>
                            @endif
                            <hr>
                        @endif

                        {!! $perintah->perintah_dokter_dan_pengobatan->catatan_perawat or ''!!}

                        @if(Auth::user()->jabatan_id == 3)
                            @if(!empty($perintah->perintah_dokter_dan_pengobatan->catatan_perawat))
                                <br><hr>
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-perintah="{{ $perintah->perintah_dokter_dan_pengobatan->id }}" data-perintah="{!! html_entity_decode($perintah->planning_perintah_dokter_dan_pengobatan) !!}" data-catatan="{{ $perintah->perintah_dokter_dan_pengobatan->catatan_perawat }}" data-target="#modalUbahCatatanPerintah">Ubah</button>
                                </div>
                            @else
                                <div class="btn-group float-left">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-perintah="{{ $perintah->id }}" data-perintah="{!! html_entity_decode($perintah->planning_perintah_dokter_dan_pengobatan) !!}" data-target="#modalBuatCatatanBaru">Catatan Baru</button>
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('content-mobile')
    <div class="card-body">
        <div class="page-header">
            <h4>Perintah Dokter dan Pengobatan: {{ ucwords($ranap->pasien->nama) }}</h4>
            <hr>
            <div class="col-md-12">
                <table>
                    <tbody class="small">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td style="padding-left: 10px">: {{ ucwords($ranap->pasien->jenkel) }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td id="umur" style="padding-left: 10px"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td style="padding-left: 10px" id="tanggal_masuk_mobile">:</td>
                        </tr>
                        <tr>
                            <th>Diagnosa Awal</th>
                            <td style="padding-left: 10px">: {{ ucfirst($ranap->diagnosa_awal) }}</td>
                        </tr>
                        <tr>
                            <th>DPJP</th>
                            <td style="padding-left: 10px">: {{ ucwords($ranap->user->nama) }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p id="tanggal_lahir" hidden>{{ $ranap->pasien->tanggal_lahir }}</p>
                <p id="tgl_masuk_mobile" hidden>{{ $ranap->tanggal_masuk }}</p>
            </div>
        </div>
        <table class="table table-striped small">
            <thead>
                <tr>
                    <th>Terapi dan Rencana Tindakan</th>
                    <th>Catatan Perawat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perintahs as $perintah)
                <tr>
                    <td class="text-justify w-50">
                        Dibuat tanggal:<br><b>{{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</b>
                        @if(strtotime($perintah->created_at) == strtotime($perintah->updated_at))
                            <hr>
                            Diubah tanggal:<br><b>–</b>
                        @else
                            <hr>
                            Diubah tanggal:<br><b>{{ date("d F Y", strtotime($perintah->updated_at)) }}</b>
                        @endif
                        <hr>

                        <p>{!! $perintah->planning_perintah_dokter_dan_pengobatan !!} &nbsp;<a href="{{ route('perjalanan_penyakit.show', [$ranap->id, $perintah->id]) }}">Perjalanan Penyakit...</a></p>
                    </td>
                    <td class="text-justify">
                        @if(!empty($perintah->perintah_dokter_dan_pengobatan))
                            Dibuat tanggal:<br><b>{{ date("d F Y", strtotime($perintah->perintah_dokter_dan_pengobatan->tanggal_keterangan)) }}</b> oleh <b>{{ $perintah->perintah_dokter_dan_pengobatan->user->nama }}</b>
                            @if(strtotime($perintah->perintah_dokter_dan_pengobatan->created_at) == strtotime($perintah->perintah_dokter_dan_pengobatan->updated_at))
                                <hr>
                                Diubah tanggal:<br><b>–</b>
                            @else
                                <hr>
                                Diubah tanggal:<br><b>{{ date("d F Y", strtotime($perintah->perintah_dokter_dan_pengobatan->updated_at)) }}</b>
                            @endif
                            <hr>
                        @endif

                        {!! $perintah->perintah_dokter_dan_pengobatan->catatan_perawat or ''!!}

                        @if(Auth::user()->jabatan_id == 3)
                            @if(!empty($perintah->perintah_dokter_dan_pengobatan->catatan_perawat))
                                <br><hr>
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-perintah="{{ $perintah->perintah_dokter_dan_pengobatan->id }}" data-perintah="{!! html_entity_decode($perintah->planning_perintah_dokter_dan_pengobatan) !!}" data-catatan="{{ $perintah->perintah_dokter_dan_pengobatan->catatan_perawat }}" data-target="#modalUbahCatatanPerintah">Ubah</button>
                                </div>
                            @else
                                <div class="btn-group float-left">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-perintah="{{ $perintah->id }}" data-perintah="{!! html_entity_decode($perintah->planning_perintah_dokter_dan_pengobatan) !!}" data-target="#modalBuatCatatanBaru">Catatan Baru</button>
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection

@section('modal')
    <div class="modal fade" id="modalBuatCatatanBaru" tabindex="-1" role="dialog" aria-labelledby="modalBuatCatatanBaru" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBuatCatatanBaru">Buat Catatan Perintah Dokter dan Pengobatan Pasien: {{ ucwords($ranap->pasien->nama) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => ['perintah_dokter_dan_pengobatan.store']]) }}
                <div class="modal-body">
                    <div hidden>
                        <label for="id_ranap" class="control-label">ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap">
                    </div>

                    <div hidden>
                        <label for="id_perintah" class="control-label">ID Perintah:</label>
                        <input type="text" name="id_perintah" id="id_perintah">
                    </div>

                    <label><b>Terapi dan Rencana Tindakan:</b></label>
                    <p id="perintah"></p>
                    <hr>

                    <div class="form-group">
                        {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                        {{ Form::textarea('catatan_perawat', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahCatatanPerintah" tabindex="-1" role="dialog" aria-labelledby="modalUbahCatatanPerintah" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahCatatanPerintah">Ubah Rincian Perintah Dokter dan Pengobatan Pasien: {{ ucwords($ranap->pasien->nama) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="reset"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'PATCH', 'route' => ['perintah_dokter_dan_pengobatan.update']]) }}
                <div class="modal-body">
                    <div hidden>
                        <label for="id_ranap" class="control-label">ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap">
                    </div>

                    <div hidden>
                        <label for="id" class="control-label">ID Perintah:</label>
                        <input type="text" name="id" id="id">
                    </div>

                    <label><b>Terapi dan Rencana Tindakan:</b></label>
                    <p id="perintah"></p>
                    <hr>

                    <div class="form-group">
                        {{ Form::label('catatan_perawat', 'Catatan Perawat', ['class' => 'control-label']) }}
                        {{ Form::textarea('catatan_perawat', null, ['class' => 'form-control']) }}
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
            $('#modalBuatCatatanBaru').on('shown.bs.modal', function (e) {
                $("#modalBuatCatatanBaru").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalBuatCatatanBaru").find('#id_perintah').val($(e.relatedTarget).data('id-perintah'));
                $("#modalBuatCatatanBaru").find('#perintah').html($("<span />", { html: $(e.relatedTarget).data('perintah')}).text());
                $("#catatan_perawat").htmlarea();
            });

            $('#modalUbahCatatanPerintah').on("shown.bs.modal", function (e) {
                $("#modalUbahCatatanPerintah").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalUbahCatatanPerintah").find('#id').val($(e.relatedTarget).data('id-perintah'));
                $("#modalUbahCatatanPerintah").find('#perintah').html($("<span />", { html: $(e.relatedTarget).data('perintah')}).text());
                $("#modalUbahCatatanPerintah").find('#catatan_perawat').htmlarea('html', $(e.relatedTarget).data('catatan'));
            });
        });

        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    @include('layouttemplate::attributes.perintah_dokter')
@endsection
