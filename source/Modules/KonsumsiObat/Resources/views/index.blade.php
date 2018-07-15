@extends('layouttemplate::master-ranap')

@section('title')
    Konsumsi Obat Pasien
@endsection

@section('content')
    <div class="card-body">
        <div class="col-md-12">
            <div class="page-header">
                @if(Auth::user()->jabatan_id == 3)
                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-target="#modalCatatanHariPerawatanBaru">Catatan Hari Perawatan Baru</button>
                @endif
                <h4>Konsumsi Obat: {{ $ranap->pasien->nama }}</h4>
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
            <table class="table table-bordered table-sm">
                <tbody>
                @foreach($haris as $hari)
                    <tr class="table-info">
                        <th colspan="2" class="text-center">Tanggal</th>
                        <td colspan="4" class="text-center">{{ date("d F Y", strtotime($hari->tanggal)) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Hari Perawatan</th>
                        <td colspan="4" class="text-center">{{ $hari->hari_perawatan }}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Tinggi Badan</th>
                        <td colspan="4" class="text-center">{{ $hari->tinggi_badan }} cm</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Berat Badan</th>
                        <td colspan="4" class="text-center">{{ $hari->berat_badan }} kg</td>
                    </tr>
                    <tr>
                        <th class="text-center">Nama Obat</th>
                        <th class="text-center">Dosis</th>
                        <th class="text-center">Pagi</th>
                        <th class="text-center">Siang</th>
                        <th class="text-center">Sore</th>
                        <th class="text-center">Malam</th>
                    </tr>
                    @foreach($hari->konsumsi_obat as $obat)
                        <tr>
                            <td class="text-center">{{ $obat->obat->nama }}</td>
                            <td class="text-center">{{ $obat->dosis }}</td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_pagi->jumlah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiPagi" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    {{ $obat->konsumsi_obat_pagi->jumlah }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_siang->jumlah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSiang" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    {{ $obat->konsumsi_obat_siang->jumlah }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_sore->jumlah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSore" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    {{ $obat->konsumsi_obat_sore->jumlah }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_malam->jumlah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiMalam" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    {{ $obat->konsumsi_obat_malam->jumlah }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><button type="button" class="btn btn-default" style="width: 100%" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-target="#modalTambahKonsumsiObat"><i class="fa fa-plus"></i> Tambah Obat</button></td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="6"><br></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
                            {{ Form::label('tinggi_badan', 'Tinggi Badan', ['class' => 'control-label']) }}
                            {{ Form::number('tinggi_badan', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('berat_badan', 'Berat Badan', ['class' => 'control-label']) }}
                            {{ Form::number('berat_badan', null, ['class' => 'form-control']) }}
                        </div>

                        <div hidden>
                            {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
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

    <div class="modal fade" id="modalTambahKonsumsiObat" tabindex="-1" role="dialog" aria-labelledby="modalTambahKonsumsiObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Konsumsi Obat Pasien: {{ $ranap->pasien->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'konsumsi_obat.store']) }}
                <div class="modal-body">
                    <div class="form-group">

                        <div class="form-group" hidden>
                            <label for="id_ranap" class="control-label">ID Ranap:</label>
                            <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}">
                        </div>

                        <div class="form-group" hidden>
                            <label for="id_hari_perawatan" class="control-label">ID Hari Perawatan:</label>
                            <input type="text" name="id_hari_perawatan" id="id_hari_perawatan">
                        </div>

                        <div class="form-group">
                            {{ Form::label('id_obat', 'Obat', ['class' => 'control-label']) }}
                            <select class="form-control" name="id_obat">
                                @foreach($daftars as $obat)
                                    <option value="{{ $obat->id }}" id="id_obat" name="{{ $obat->id }}">{{ ucfirst($obat->nama) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('dosis', 'Dosis', ['class' => 'control-label']) }}
                            {{ Form::number('dosis', null, ['class' => 'form-control']) }}
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

    <div class="modal fade" id="modalKonsumsiPagi" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiPagi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rincian Konsumsi Obat Pagi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body">
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="pagi" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiSiang" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiSiang">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rincian Konsumsi Obat Siang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body">
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="siang" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiSore" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiSore">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rincian Konsumsi Obat Sore</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body">
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="sore" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiMalam" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiMalam">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rincian Konsumsi Obat Malam</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body">
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="malam" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
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
        $(function() {
            $('#modalTambahKonsumsiObat').on("show.bs.modal", function (e) {
                $("#modalTambahKonsumsiObat").find('#id_hari_perawatan').val($(e.relatedTarget).data('id-hari-perawatan'));
            });

            $('#modalKonsumsiPagi').on("show.bs.modal", function (e) {
                $("#modalKonsumsiPagi").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiSiang').on("show.bs.modal", function (e) {
                $("#modalKonsumsiSiang").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiSore').on("show.bs.modal", function (e) {
                $("#modalKonsumsiSore").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiMalam').on("show.bs.modal", function (e) {
                $("#modalKonsumsiMalam").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });
        });
    </script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
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
    @include('layouttemplate::attributes.konsumsi_obat')
@endsection
