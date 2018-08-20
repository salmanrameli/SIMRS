@extends('layouttemplate::master-ranap')

@section('title')
    Perjalanan Penyakit Pasien
@endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            @if(Auth::user()->jabatan_id == 4)
                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modalBuatPerjalananPenyakit">Buat Catatan Perjalanan Penyakit Baru</button>
            @endif

            <h4>Perjalanan Penyakit: {{ $perjalanan->rawat_inap->pasien->nama }}</h4>
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
                <td class="text-justify w-50">
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
                        <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-perjalanan="{{ $perjalanan->id }}" data-subjektif="{{ $perjalanan->subjektif }}" data-objektif="{{ $perjalanan->objektif }}" data-assessment="{{ $perjalanan->assessment }}" data-planning="{{ $perjalanan->planning_perintah_dokter_dan_pengobatan }}" data-target="#modalUbahPerjalananPenyakit">Ubah</button>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('content-mobile')
    <div class="card-body">
        <div class="page-header">
            <h4>Perjalanan Penyakit: {{ $perjalanan->rawat_inap->pasien->nama }}</h4>
            <br>
            @if(Auth::user()->jabatan_id == 4)
                <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#modalBuatPerjalananPenyakit">Buat Catatan Perjalanan Penyakit Baru</button>
            @endif
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
        <table class="table small">
            <thead>
                <tr>
                    <th>Perjalanan Penyakit</th>
                    <th>Perintah Dokter dan Pengobatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-justify w-50">
                        Dibuat tanggal:
                            <br>
                            <b>{{ date("d F Y", strtotime($perjalanan->tanggal_keterangan)) }}</b>
                        <hr>
                        @if(strtotime($perjalanan->created_at) == strtotime($perjalanan->updated_at))
                            Diubah tanggal:<br><b>–</b>
                        @else
                            Diubah tanggal:<br><b>{{ date("d F Y", strtotime($perjalanan->updated_at)) }}</b>
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
                            <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-perjalanan="{{ $perjalanan->id }}" data-subjektif="{{ $perjalanan->subjektif }}" data-objektif="{{ $perjalanan->objektif }}" data-assessment="{{ $perjalanan->assessment }}" data-planning="{{ $perjalanan->planning_perintah_dokter_dan_pengobatan }}" data-target="#modalUbahPerjalananPenyakit">Ubah</button>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    @endsection

@section('modal')
    <div class="modal fade" id="modalBuatPerjalananPenyakit" tabindex="-1" role="dialog" aria-labelledby="modalBuatPerjalananPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBuatPerjalananPenyakit">Catatan Harian Perawatan Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'POST', 'route' => ['perjalanan_penyakit.store', $ranap->id]]) }}
                <div class="modal-body">
                    <div hidden>
                        {{ Form::text('id_ranap', $ranap->id) }}
                    </div>

                    <div class="form-group">
                        <label for="datepicker" id="tanggal_keterangan" class="control-label">Tanggal</label>
                        <input type="text" id="datepicker" name="tanggal_keterangan" class="form-control" placeholder="yyyy-mm-dd">
                    </div>

                    <div class="form-group">
                        {{ Form::label('subjektif', 'Subjektif', ['class' => 'control-label']) }}
                        {{ Form::textarea('subjektif', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('objektif', 'Objektif', ['class' => 'control-label']) }}
                        {{ Form::textarea('objektif', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('assessment', 'Assessment', ['class' => 'control-label']) }}
                        {{ Form::textarea('assessment', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('planning_perintah_dokter_dan_pengobatan', 'Planning / Perintah Dokter dan Pengobatan', ['class' => 'control-label']) }}
                        {{ Form::textarea('planning_perintah_dokter_dan_pengobatan', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahPerjalananPenyakit" tabindex="-1" role="dialog" aria-labelledby="modalUbahPerjalananPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahPerjalananPenyakit">Ubah Rincian Perjalanan Penyakit Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => ['perjalanan_penyakit.update']]) }}
                <div class="modal-body">
                    <div hidden>
                        {{ Form::text('id_ranap', $ranap->id) }}
                    </div>

                    <div hidden>
                        {{ Form::label('perjalanan', 'ID Perjalanan', ['class' => 'control-label']) }}
                        {{ Form::textarea('perjalanan', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('subjektif_edit', 'Subjektif', ['class' => 'control-label']) }}
                        {{ Form::textarea('subjektif_edit', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('objektif_edit', 'Objektif', ['class' => 'control-label']) }}
                        {{ Form::textarea('objektif_edit', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('assessment_edit', 'Assessment', ['class' => 'control-label']) }}
                        {{ Form::textarea('assessment_edit', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('planning_perintah_dokter_dan_pengobatan_edit', 'Planning / Perintah Dokter dan Pengobatan', ['class' => 'control-label']) }}
                        {{ Form::textarea('planning_perintah_dokter_dan_pengobatan_edit', null, ['class' => 'form-control']) }}
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
            $('#modalBuatPerjalananPenyakit').on('shown.bs.modal', function () {
                $("#subjektif").htmlarea();
                $("#objektif").htmlarea();
                $("#assessment").htmlarea();
                $("#planning_perintah_dokter_dan_pengobatan").htmlarea();
            });

            $('#modalUbahPerjalananPenyakit').on("shown.bs.modal", function (e) {
                $("#perjalanan").htmlarea('html', $(e.relatedTarget).data('perjalanan'));
                $("#subjektif_edit").htmlarea('html', $(e.relatedTarget).data('subjektif') );
                $("#objektif_edit").htmlarea('html', $(e.relatedTarget).data('objektif'));
                $("#assessment_edit").htmlarea('html', $(e.relatedTarget).data('assessment'));
                $("#planning_perintah_dokter_dan_pengobatan_edit").htmlarea('html', $(e.relatedTarget).data('planning'));
            });
        });

        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    @include('layouttemplate::attributes.perjalanan_penyakit')
@endsection
