@extends('layouttemplate::master-ranap')

@section('title')
    Konsumsi Obat Pasien
@endsection

@section('content')
    <div class="d-none d-sm-block">
        <div class="card-body">
        <div class="col-md-12">
            <div class="page-header">
                @if(Auth::user()->jabatan_id == 3)
                    <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-target="#modalCatatanHariPerawatanBaru">Buat Catatan Hari Perawatan Baru</button>
                @endif
                <h4>Terapi / Penatalaksanaan Pasien: {{ ucwords($ranap->pasien->nama) }}</h4>
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
            <table class="table table-bordered table-sm">
                <tbody>
                @foreach($haris as $hari)
                    <tr>
                        <th colspan="3" class="text-center table-info"><i class="fas fa-calendar-alt"></i> Tanggal</th>
                        <td colspan="4" class="text-center table-info">{{ date("d F Y", strtotime($hari->tanggal)) }}</td>
                        <th rowspan="5" class="align-middle text-center" width="20%">Keterangan</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center">Hari Perawatan</th>
                        <td colspan="4" class="text-center">{{ $hari->hari_perawatan }}</td>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center">Tinggi Badan</th>
                        <td colspan="4" class="text-center">{{ $hari->tinggi_badan }} cm</td>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center">Berat Badan</th>
                        <td colspan="4" class="text-center">{{ $hari->berat_badan }} kg</td>
                    </tr>
                    <tr>
                        <th class="text-center">Nama Obat</th>
                        <th class="text-center">Pemberian</th>
                        <th class="text-center">Dosis</th>
                        <th class="text-center">Pagi</th>
                        <th class="text-center">Siang</th>
                        <th class="text-center">Sore</th>
                        <th class="text-center">Malam</th>
                    </tr>
                    @foreach($hari->konsumsi_obat as $obat)
                        <tr>
                            <td class="text-center">{{ ucfirst($obat->obat->nama) }}</td>
                            <td class="text-center">{{ ucfirst($obat->obat->tipe_obat) }}</td>
                            <td class="text-center">{{ $obat->dosis }}</td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_pagi->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiPagi" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_siang->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSiang" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_sore->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSore" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_malam->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiMalam" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($obat->keterangan)
                                    {{ ucfirst($obat->keterangan) }}
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropright</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="nav-link" data-toggle="modal" data-id-keterangan="{{ $obat->id }}" data-keterangan="{{ $obat->keterangan }}" data-target="#modalUbahKeteranganObat">Ubah</a>
                                        </div>
                                    </div>
                                @else
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-keterangan="{{ $obat->id }}" data-target="#modalTambahKeteranganObat" style="width: 100%"><i class="fa fa-plus"></i></button>
                                        @else
                                        -
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @if(Auth::user()->jabatan_id == 3)
                    <tr>
                        <td><button type="button" class="btn btn-default" style="width: 100%;" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-target="#modalTambahKonsumsiObat"><i class="fa fa-plus"></i> Tambah Obat</button></td>
                        <td colspan="7"></td>
                    </tr>
                    @endif
                    <tr style="border-left-style: hidden; border-right-style: hidden; border-bottom-style: hidden">
                        <td colspan="8"><br></td>
                    </tr>
                @endforeach
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
                <h4>Terapi / Penatalaksanaan Pasien: {{ ucwords($ranap->pasien->nama) }}</h4>
                <br>
                @if(Auth::user()->jabatan_id == 3)
                    <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-id-ranap="{{ $ranap->id }}" data-target="#modalCatatanHariPerawatanBaru">Buat Catatan Hari Perawatan Baru</button>
                @endif
                <hr>
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
            <table class="table table-bordered table-sm">
                <tbody>
                @foreach($haris as $hari)
                    <tr>
                        <th colspan="2" class="text-center table-info"><i class="fas fa-calendar-alt"></i> Tanggal</th>
                        <td colspan="2" class="text-center table-info">{{ date("d F Y", strtotime($hari->tanggal)) }}</td>
                        <th rowspan="5" class="align-middle text-center" width="20%">Keterangan</th>
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
                        <th colspan="4" class="text-center">Nama Obat</th>
                    </tr>
                    @foreach($hari->konsumsi_obat as $obat)
                        <tr>
                            <td colspan="4" class="text-center">{{ ucfirst($obat->obat->nama) }}</td>
                            <td rowspan="3" class="text-center">
                                @if($obat->keterangan)
                                    {{ ucfirst($obat->keterangan) }}
                                    <br>
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropright</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="nav-link" data-toggle="modal" data-id-keterangan="{{ $obat->id }}" data-keterangan="{{ $obat->keterangan }}" data-target="#modalUbahKeteranganObat">Ubah</a>
                                        </div>
                                    </div>
                                @else
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-keterangan="{{ $obat->id }}" data-target="#modalTambahKeteranganObat" style="width: 100%"><i class="fa fa-plus"></i></button>
                                    @else
                                        -
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">Pa</td>
                            <td class="text-center">Si</td>
                            <td class="text-center">So</td>
                            <td class="text-center">Ma</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_pagi->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiPagi" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_siang->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSiang" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_sore->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiSore" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($obat->konsumsi_obat_malam->sudah))
                                    @if(Auth::user()->jabatan_id == 3)
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-target="#modalKonsumsiMalam" style="width: 100%"><i class="fa fa-plus-circle"></i></button>
                                    @endif
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @if(Auth::user()->jabatan_id == 3)
                        <tr>
                            <td colspan="5"><button type="button" class="btn btn-default" style="width: 100%;" data-toggle="modal" data-id-hari-perawatan="{{ $hari->id }}" data-target="#modalTambahKonsumsiObat"><i class="fa fa-plus"></i> Tambah Obat</button></td>
                        </tr>
                    @endif
                    <tr style="border-left-style: hidden; border-right-style: hidden">
                        <td colspan="5" style="margin-bottom: 10px"><br></td>
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

    <div class="modal fade" id="modalTambahKeteranganObat" tabindex="-1" role="dialog" aria-labelledby="modalTambahKeteranganObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKeteranganObat">Tambah Keterangan Konsumsi Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'konsumsi_obat.update_keterangan']) }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group" hidden>
                            <label for="id_ranap" class="control-label">ID Ranap:</label>
                            <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}">
                        </div>

                        <div class="form-group" hidden>
                            <label for="id_konsumsi_obat" class="control-label">ID Konsumsi Obat:</label>
                            <input type="text" name="id_konsumsi_obat" id="id_konsumsi_obat">
                        </div>

                        <div class="form-group">
                            {{ Form::label('keterangan', 'Keterangan', ['class' => 'control-label']) }}
                            {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
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

    <div class="modal fade" id="modalUbahKeteranganObat" tabindex="-1" role="dialog" aria-labelledby="modalUbahKeteranganObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahKeteranganObat">Ubah Keterangan Konsumsi Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'PATCH', 'route' => 'konsumsi_obat.update_keterangan']) }}
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label for="id_ranap" class="control-label">ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}">
                    </div>

                    <div class="form-group" hidden>
                        <label for="id_konsumsi_obat" class="control-label">ID Konsumsi Obat:</label>
                        <input type="text" name="id_konsumsi_obat" id="id_konsumsi_obat">
                    </div>

                    <div class="form-group">
                        {{ Form::label('keterangan', 'Keterangan', ['class' => 'control-label']) }}
                        {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahKonsumsiObat" tabindex="-1" role="dialog" aria-labelledby="modalTambahKonsumsiObat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Konsumsi Obat Pasien: {{ ucwords($ranap->pasien->nama) }}</h5>
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
                                    <option value="{{ $obat->id }}" id="id_obat" name="{{ $obat->id }}">{{ ucwords($obat->nama) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('dosis', 'Dosis', ['class' => 'control-label']) }}
                            {{ Form::number('dosis', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('keterangan', 'Keterangan', ['class' => 'control-label']) }}
                            {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi konsumsi obat pagi pasien?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body" hidden>
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="pagi" hidden>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Ya', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiSiang" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiSiang">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi konsumsi obat siang pasien?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body" hidden>
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="siang" hidden>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Ya', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiSore" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiSore">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi konsumsi obat sore pasien?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body" hidden>
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="sore" hidden>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Ya', ['class' => 'btn btn-outline-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonsumsiMalam" tabindex="-1" role="dialog" aria-labelledby="modalKonsumsiMalam">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi konsumsi obat malam pasien?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                <div class="modal-body" hidden>
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" value="{{ $ranap->id }}" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="malam" hidden>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Ya', ['class' => 'btn btn-outline-success']) }}
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

            $('#modalTambahKeteranganObat').on("show.bs.modal", function (e) {
                $("#modalTambahKeteranganObat").find('#id_konsumsi_obat').val($(e.relatedTarget).data('id-keterangan'));
            });

            $('#modalUbahKeteranganObat').on("show.bs.modal", function (e) {
                $("#modalUbahKeteranganObat").find('#id_konsumsi_obat').val($(e.relatedTarget).data('id-keterangan'));
                $("#modalUbahKeteranganObat").find('#keterangan').val($(e.relatedTarget).data('keterangan'));
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
    @include('layouttemplate::attributes.konsumsi_obat')
@endsection
