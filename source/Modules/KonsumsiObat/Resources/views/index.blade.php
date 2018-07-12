@extends('layouttemplate::master')

@section('title')
    Konsumsi Obat Pasien
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
                        <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $ranap->id) }}">Perintah Dokter dan Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catatan_harian_perawatan.index', $ranap->id) }}">Catatan Harian dan Perawatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('konsumsi_obat.index', $ranap->id) }}">Konsumsi Obat</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">

                        <div class="float-right"><a href="{{ route('konsumsi_obat.create', $ranap->id) }}" class="btn btn-outline-primary">Tambah Konsumsi Obat</a></div>

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
                            @foreach($obats->groupBy('tanggal') as $obats)
                                <tr class="table-info">
                                    <th colspan="2" class="text-center">Tanggal</th>
                                    <td colspan="4" class="text-center">{{ date("d F Y", strtotime($obats[0]['tanggal'])) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">Hari Perawatan</th>
                                    <td colspan="4" class="text-center">{{ $obats[0]['hari_perawatan'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center">Nama Obat</th>
                                    <th class="text-center">Dosis</th>
                                    <th class="text-center">Pagi</th>
                                    <th class="text-center">Siang</th>
                                    <th class="text-center">Sore</th>
                                    <th class="text-center">Malam</th>
                                </tr>
                                @foreach($obats as $obat)
                                <tr>
                                    <td class="text-center">{{ $obat->obat->nama }}</td>
                                    <td class="text-center">{{ $obat->dosis }}</td>
                                    <td class="text-center">
                                        @if(empty($obat->konsumsi_obat_pagi->jumlah))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-id-ranap="{{ $ranap->id }}" data-target="#modalKonsumsiPagi">+</button>
                                        @else
                                            {{ $obat->konsumsi_obat_pagi->jumlah }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(empty($obat->konsumsi_obat_siang->jumlah))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-id-ranap="{{ $ranap->id }}" data-target="#modalKonsumsiSiang">+</button>
                                        @else
                                            {{ $obat->konsumsi_obat_siang->jumlah }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(empty($obat->konsumsi_obat_sore->jumlah))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-id-ranap="{{ $ranap->id }}" data-target="#modalKonsumsiSore">+</button>
                                        @else
                                            {{ $obat->konsumsi_obat_sore->jumlah }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(empty($obat->konsumsi_obat_malam->jumlah))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-id-obat="{{ $obat->id }}" data-id-ranap="{{ $ranap->id }}" data-target="#modalKonsumsiMalam">+</button>
                                        @else
                                            {{ $obat->konsumsi_obat_malam->jumlah }}
                                        @endif
                                    </td>
                                </tr>
                                    @if($loop->last)
                                       <tr>
                                           <td colspan="6"><br></td>
                                       </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                        </tbody>
                    </table>
                </div>
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
                <div class="modal-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                        <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                        <input type="text" name="id_ranap" id="id_ranap" hidden>

                        <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                        <input type="text" name="id_obat" id="id_obat" hidden>

                        <label for="waktu" class="control-label" hidden>Waktu:</label>
                        <input type="text" name="waktu" id="waktu" value="pagi" hidden>

                        <label for="jumlah" class="control-label">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control">

                        <div hidden>
                            {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                        </div>

                        <br>

                        {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                        {{ Form::close() }}
                </div>
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
                <div class="modal-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="siang" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">

                    <div hidden>
                        {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                    </div>

                    <br>

                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                    {{ Form::close() }}
                </div>
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
                <div class="modal-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="sore" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">

                    <div hidden>
                        {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                    </div>

                    <br>
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}

                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                    {{ Form::close() }}
                </div>
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
                <div class="modal-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'rincian_konsumsi_obat.store']) }}
                    <label for="id_ranap" class="control-label" hidden>ID Ranap:</label>
                    <input type="text" name="id_ranap" id="id_ranap" hidden>

                    <label for="id_obat" class="control-label" hidden>ID Obat:</label>
                    <input type="text" name="id_obat" id="id_obat" hidden>

                    <label for="waktu" class="control-label" hidden>Waktu:</label>
                    <input type="text" name="waktu" id="waktu" value="malam" hidden>

                    <label for="jumlah" class="control-label">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">

                    <div hidden>
                        {{ Form::text('id_petugas', \Illuminate\Support\Facades\Auth::id()) }}
                    </div>

                    <br>

                    {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#modalKonsumsiPagi').on("show.bs.modal", function (e) {
                $("#modalKonsumsiPagi").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalKonsumsiPagi").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiSiang').on("show.bs.modal", function (e) {
                $("#modalKonsumsiSiang").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalKonsumsiSiang").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiSore').on("show.bs.modal", function (e) {
                $("#modalKonsumsiSore").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalKonsumsiSore").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
            });

            $('#modalKonsumsiMalam').on("show.bs.modal", function (e) {
                $("#modalKonsumsiMalam").find('#id_ranap').val($(e.relatedTarget).data('id-ranap'));
                $("#modalKonsumsiMalam").find('#id_obat').val($(e.relatedTarget).data('id-obat'));
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
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
