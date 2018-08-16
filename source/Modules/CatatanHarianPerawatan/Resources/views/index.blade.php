@extends('layouttemplate::master-ranap')

@section('title')
    Catatan Harian Perawatan Pasien
@endsection

@section('content')
    <div class="d-none d-sm-block">
        <div class="card-body">
            <div class="col-md-12">
                <div class="page-header">
                    @if(Auth::user()->jabatan_id == 3)
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modalBuatCatatanHarian">Buat Catatan Harian dan Perawatan Baru</button>
                    @endif
                    <h4>Catatan Harian Perawatan: {{ ucwords($ranap->pasien->nama) }}</h4>
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
                                <td style="padding-left: 10px">: {{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
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
                    </div>
                </div>
                <table class="table table-striped small">
                    <thead>
                    <tr>
                        <th>Asuhan Keperawatan (SOAP)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($catatans))
                        @foreach($catatans as $catatan)
                            <tr>
                                <td class="text-justify w-75">
                                    <b>Dibuat tanggal: {{ date("d F Y", strtotime($catatan->tanggal_keterangan)) }} – {{ $catatan->jam }}</b><br>
                                    @if(date("d F Y", strtotime($catatan->tanggal_keterangan)) == date("d F Y", strtotime($catatan->updated_at)))
                                        <b>Diubah tanggal: –</b>
                                    @else
                                        <b>Diubah tanggal: {{ date("d F Y", strtotime($catatan->updated_at)) }}</b>
                                    @endif
                                    <br><b>Ditulis oleh: {{ ucwords($catatan->user->nama) }}</b>
                                    <hr>
                                    <p>{!! $catatan->asuhan_keperawatan_soap !!}</p>
                                    <hr>
                                    @if(Auth::user()->jabatan_id == 3 && Auth::user()->id == $catatan->id_petugas)
                                        <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-catatan-harian="{{ $catatan->id }}" data-asuhan-keperawatan="{{ $catatan->asuhan_keperawatan_soap }}" data-target="#modalUbahCatatanHarian">Ubah</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('content-mobile')
    <div class="d-block d-sm-none">
        <div class="card-body">
            <div class="page-header">
                <h4>Catatan Harian Perawatan: {{ ucwords($ranap->pasien->nama) }}</h4>
                <br>
                @if(Auth::user()->jabatan_id == 3)
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalBuatCatatanHarian">Buat Catatan Harian dan Perawatan Baru</button>
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
                                <td style="padding-left: 10px">: {{ date("d F Y", strtotime($ranap->tanggal_masuk)) }}</td>
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
                </div>
            </div>
            <table class="table table-striped small">
                <thead>
                    <tr>
                        <th>Asuhan Keperawatan (SOAP)</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($catatans))
                    @foreach($catatans as $catatan)
                        <tr>
                            <td class="text-justify w-75">
                                <b>Dibuat tanggal: {{ date("d F Y", strtotime($catatan->tanggal_keterangan)) }} – {{ $catatan->jam }}</b><br>
                                @if(date("d F Y", strtotime($catatan->tanggal_keterangan)) == date("d F Y", strtotime($catatan->updated_at)))
                                    <b>Diubah tanggal: –</b>
                                @else
                                    <b>Diubah tanggal: {{ date("d F Y", strtotime($catatan->updated_at)) }}</b>
                                @endif
                                <br><b>Ditulis oleh: {{ ucwords($catatan->user->nama) }}</b>
                                <hr>
                                <p>{!! $catatan->asuhan_keperawatan_soap !!}</p>
                                <hr>
                                @if(Auth::user()->jabatan_id == 3 && Auth::user()->id == $catatan->id_petugas)
                                    <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-id-catatan-harian="{{ $catatan->id }}" data-asuhan-keperawatan="{{ $catatan->asuhan_keperawatan_soap }}" data-target="#modalUbahCatatanHarian">Ubah</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('modal')
    <div class="modal fade" id="modalBuatCatatanHarian" tabindex="-1" role="dialog" aria-labelledby="modalBuatCatatanHarian" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catatan Harian Perawatan Pasien: {{ ucwords($ranap->pasien->nama) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'POST', 'route' => ['catatan_harian_perawatan.store']]) }}
                <div class="modal-body">
                    <div hidden>
                        {{ Form::text('id_ranap', $ranap->id) }}
                    </div>

                    <div class="form-group">
                        <label for="datepicker" id="tanggal_keterangan" class="control-label">Tanggal</label>
                        <input type="text" id="datepicker" name="tanggal_keterangan" class="form-control" placeholder="yyyy-mm-dd">
                    </div>

                    <div class="bootstrap-timepicker">
                        <label for="timepicker">Jam (HH:MM)</label>
                        <input id="timepicker" type="text" class="input-small form-control" name="jam">
                    </div>
                    <div class="form-group">
                        {{ Form::label('asuhan_keperawatan_soap', 'Asuhan Keperawatan', ['class' => 'control-label']) }}
                        {!! Form::textarea('asuhan_keperawatan_soap', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahCatatanHarian" tabindex="-1" role="dialog" aria-labelledby="modalUbahCatatanHarian" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahCatatanHarian">Ubah Rincian Catatan Harian Perawatan Pasien: {{ ucwords($ranap->pasien->nama) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                {{ Form::open(['method' => 'PATCH', 'route' => ['catatan_harian_perawatan.update']]) }}
                <div class="modal-body">
                    <div hidden>
                        <label for="id_ranap" class="control-label">ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap">
                    </div>

                    <div class="form-group" hidden>
                        {{ Form::label('id_catatan_harian', 'ID Catatan Harian', ['class' => 'control-label']) }}
                        {{ Form::text('id_catatan_harian', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('asuhan_keperawatan_soap', 'Asuhan Keperawatan', ['class' => 'control-label']) }}
                        {!! Form::textarea('asuhan_keperawatan_soap', null, ['class' => 'form-control']) !!}
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
            $('#modalBuatCatatanHarian').on('shown.bs.modal', function () {
                $("#asuhan_keperawatan_soap").htmlarea();
            });

            $('#modalUbahCatatanHarian').on("shown.bs.modal", function (e) {
                $("#modalUbahCatatanHarian").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalUbahCatatanHarian").find('#id_catatan_harian').val($(e.relatedTarget).data('id-catatan-harian'));
                $("#modalUbahCatatanHarian").find("#asuhan_keperawatan_soap").htmlarea('html', $(e.relatedTarget).data('asuhan-keperawatan'));
            });
        });

        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        $('#timepicker').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 1,
            showMeridian: false
        });
    </script>
    @include('layouttemplate::attributes.catatan_harian')
@endsection
