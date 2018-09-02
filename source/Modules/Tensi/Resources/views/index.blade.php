@extends('layouttemplate::master-ranap')

@section('title')
    Tensi Pasien
@endsection

@section('content')
    <div class="card-body">
        <div class="page-header">
            @if(Auth::user()->jabatan_id == 3)
                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-target="#modalCatatanHariPerawatanBaru">Buat Catatan Hari Perawatan Baru</button>
            @endif
            <h4>Tensi Pasien: {{ ucwords($ranap->pasien->nama) }}</h4>
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
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
            <tbody>
            @foreach($haris as $hari)
                <tr>
                    <th colspan="2" class="text-center table-info"><i class="fas fa-calendar-alt"></i> Tanggal</th>
                    <td colspan="2" class="text-center table-info">{{ date("d F Y", strtotime($hari->tanggal)) }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Hari Perawatan</th>
                    <td colspan="2" class="text-center">{{ $hari->hari_perawatan }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Tinggi Badan</th>
                    <td colspan="2" class="text-center">{{ $hari->tinggi_badan }} cm</td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Berat Badan</th>
                    <td colspan="2" class="text-center">{{ $hari->berat_badan }} kg</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Tensi</th>
                </tr>
                <tr>
                    <td class="text-center">
                        @if(empty($hari->tensi_pagi->tensi_atas))
                            @if(Auth::user()->jabatan_id == 3)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-waktu="pagi" data-target="#modalTambahCatatanTensi">Tambah Catatan Tensi Pagi</button>
                            @endif
                        @else
                            <b>Pagi:</b> {{ $hari->tensi_pagi->tensi_atas }} - {{ $hari->tensi_pagi->tensi_bawah }}, {{ $hari->tensi_pagi->temperatur }}º
                        @endif
                    </td>
                    <td class="text-center">
                        @if(empty($hari->tensi_siang->tensi_atas))
                            @if(Auth::user()->jabatan_id == 3)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-waktu="siang" data-target="#modalTambahCatatanTensi">Tambah Catatan Tensi Siang</button>
                            @endif
                        @else
                            <b>Siang:</b> {{ $hari->tensi_siang->tensi_atas }} - {{ $hari->tensi_siang->tensi_bawah }}, {{ $hari->tensi_siang->temperatur }}º
                        @endif
                    </td>
                    <td class="text-center">
                        @if(empty($hari->tensi_sore->tensi_atas))
                            @if(Auth::user()->jabatan_id == 3)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-waktu="sore" data-target="#modalTambahCatatanTensi">Tambah Catatan Tensi Sore</button>
                            @endif
                        @else
                            <b>Sore:</b> {{ $hari->tensi_sore->tensi_atas }} - {{ $hari->tensi_sore->tensi_bawah }}, {{ $hari->tensi_sore->temperatur }}º
                        @endif
                    </td>
                    <td class="text-center">
                        @if(empty($hari->tensi_malam->tensi_atas))
                            @if(Auth::user()->jabatan_id == 3)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-waktu="malam" data-target="#modalTambahCatatanTensi">Tambah Catatan Tensi Malam</button>
                            @endif
                        @else
                            <b>Malam:</b> {{ $hari->tensi_malam->tensi_atas }} - {{ $hari->tensi_malam->tensi_bawah }}, {{ $hari->tensi_malam->temperatur }}º
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="d-none d-md-table-cell" colspan="4">
                        <div id="chart_{{ $hari->id }}"></div>
                        @linechart($hari->id.'_tensi', 'chart_'.$hari->id)
                    </td>
                </tr>
                <tr style="border-left-style: hidden; border-right-style: hidden; border-bottom-style: hidden">
                    <td colspan="4"><br></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modalCatatanHariPerawatanBaru" tabindex="-1" role="dialog" aria-labelledby="modalCatatanHariPerawatanBaru" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCatatanHariPerawatanBaru">Catatan Hari Perawatan Baru Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'hari_perawatan.store']) }}
                <div class="modal-body">
                    <div class="form-group">

                        <div class="form-group" hidden>
                            <label for="id_ranap" class="control-label">ID Ranap:</label>
                            <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}">
                        </div>

                        <div class="form-group">
                            <label for="datepicker" id="tanggal" class="control-label">Tanggal</label>
                            <input type="text" id="datepicker" name="tanggal" class="form-control" placeholder="yyyy-mm-dd">
                        </div>

                        <div class="form-group">
                            {{ Form::label('hari_perawatan', 'Hari Perawatan Ke:', ['class' => 'control-label']) }}
                            {{ Form::number('hari_perawatan', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('tinggi_badan', 'Tinggi Badan (cm)', ['class' => 'control-label']) }}
                            {{ Form::number('tinggi_badan', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('berat_badan', 'Berat Badan (kg)', ['class' => 'control-label']) }}
                            {{ Form::number('berat_badan', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahCatatanTensi" tabindex="-1" role="dialog" aria-labelledby="modalTambahCatatanTensi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahCatatanTensi">Tambah Catatan Tensi Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => ['tensi.store']]) }}
                <div class="modal-body">
                    <div hidden>
                        <label for="id_hari_perawatan" class="control-label">ID Hari Perawatan:</label>
                        <input type="text" name="id_hari_perawatan" id="id_hari_perawatan">
                    </div>

                    <div class="form-group">
                        {{ Form::label('tensi_atas', 'Tensi Atas', ['class' => 'control-label']) }}
                        {{ Form::number('tensi_atas', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tensi_bawah', 'Tensi Bawah', ['class' => 'control-label']) }}
                        {{ Form::number('tensi_bawah', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('temperatur', 'Temperatur', ['class' => 'control-label']) }}
                        {{ Form::number('temperatur', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group" hidden>
                        {{ Form::label('waktu', 'Waktu', ['class' => 'control-label']) }}
                        {{ Form::text('waktu', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        $(function () {
            $('#modalTambahCatatanTensi').on("show.bs.modal", function (e) {
                $("#modalTambahCatatanTensi").find('#id_hari_perawatan').val($(e.relatedTarget).data('id-hari-perawatan'));
                $("#modalTambahCatatanTensi").find('#waktu').val($(e.relatedTarget).data('waktu'));
            });
        })
    </script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    @include('tensi::attribute.nav')
@endsection
