@extends('layouttemplate::master')

@section('title')
    Registrasi Rawat Inap Baru
    @endsection

@section('content')
    <p style="color: red">* = wajib diisi</p>
    <div class="card">
        <div class="card-header">Identitas Pasien</div>
        <div class="card-body">
            {{ Form::open(['route' => 'ranap.store']) }}

            <div class="form-group">
                {{ Form::label('id_rm', 'Nomor Rekam Medis *', ['class' => 'control-label']) }}
                {{ Form::text('id_rm', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="id_pasien" class="control-label">ID Penduduk Pasien *</label>
                <select id="id_pasien" name="id_pasien[]" class="form-control"></select>
            </div>

            <div class="form-group">
                <label for="datepicker" id="tanggal_masuk_ranap" class="control-label">Tanggal Masuk *</label>
                <input type="text" id="datepicker" name="tanggal_masuk_ranap" class="form-control">
            </div>

            <div class="form-group">
                {{ Form::label('alergi_obat', 'Alergi Obat', ['class' => 'control-label']) }}
                {{ Form::textarea('alergi_obat', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Pembiayaan</div>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('estimasi_biaya', 'Estimasi Biaya (Rp)', ['class' => 'control-label']) }}
                {{ Form::text('estimasi_biaya', null, ['class' => 'form-control', 'placeholder' => 'Rp.......................................']) }}
            </div>
            <hr>
            <div class="form-group">
                <h5>Mampu Bayar</h5>
                {{ Form::radio('pembayaran', 'bayar sendiri', false) }}
                {{ Form::label('pembayaran', 'Bayar Sendiri', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('pembayaran', 'jaminan', false) }}
                {{ Form::label('pembayaran', 'Bayar Jaminan (sebutkan)', ['class' => 'control-label']) }}
                {{ Form::text('jaminan', null, ['class' => 'form-control']) }}
                <hr>
                <h5>Tidak Mampu Bayar</h5>
                {{ Form::radio('pembayaran', 'angsuran', false) }}
                {{ Form::label('pembayaran', 'Angsuran (Rp......./ xx kali)', ['class' => 'control-label']) }}
                {{ Form::text('angsuran', null, ['class' => 'form-control', 'placeholder' => 'Rp......................................./.......................................']) }}
                <br>
                {{ Form::radio('pembayaran', 'bantuan lain', false) }}
                {{ Form::label('pembayaran', 'Bantuan lain (sebutkan)', ['class' => 'control-label']) }}
                {{ Form::text('bantuan_lain', null, ['class' => 'form-control']) }}
            </div>
            <hr>
            <div class="form-group">
                {{ Form::label('penanggungjawab_pembayaran', 'Nama Penanggung Jawab Pembayaran', ['class' => 'control-label']) }}
                {{ Form::text('penanggungjawab_pembayaran', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('alamat_penanggungjawab_pembayaran', 'Alamat Penanggung Jawab Pembayaran', ['class' => 'control-label']) }}
                {{ Form::text('alamat_penanggungjawab_pembayaran', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('telepon_penanggungjawab_pembayaran', 'Telepon Penanggung Jawab Pembayaran', ['class' => 'control-label']) }}
                {{ Form::text('telepon_penanggungjawab_pembayaran', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('hubungan_penanggungjawab', 'Hubungan Penanggung Jawab dengan Pasien', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'Suami', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Suami', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'Istri', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Istri', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'Anak', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Anak', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'Ayah', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Ayah', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'Ibu', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Ibu', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('hubungan_penanggungjawab', 'lainnya', false) }}
                {{ Form::label('hubungan_penanggungjawab', 'Lainnya (sebutkan)', false) }}
                {{ Form::text('hubungan_penanggungjawab_lainnya', null, ['class' => "form-control"]) }}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Rincian Rawat Inap</div>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('dokter_pengirim', 'Dokter Pengirim', ['class' => 'control-label']) }}
                {{ Form::text('dokter_pengirim', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('id_petugas_penerima', 'Petugas Penerima *', ['class' => 'control-label']) }}
                <select class="form-control" name="id_petugas_penerima">
                    @foreach($petugass as $petugas)
                        <option value="{{ $petugas->id }}" id="id_petugas_penerima" name="{{ $petugas->id }}" {{ Auth::id() == $petugas->id ? 'selected' : '' }}>{{ ucwords($petugas->nama) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('diagnosa_awal', 'Diagnosa Awal', ['class' => 'control-label']) }}
                {{ Form::text('diagnosa_awal', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('icd_x_diagnosa_awal', 'ICD X Diagnosa Awal', ['class' => 'control-label']) }}
                {{ Form::text('icd_x_diagnosa_awal', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('id_dokter_pj', 'Dokter Penanggung Jawab *', ['class' => 'control-label']) }}
                <select class="form-control" name="id_dokter_pj">
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" id="id_dokter_pj" name="{{ $dokter->id }}">{{ ucwords($dokter->nama) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('diagnosa_sekunder', 'Diagnosa Sekunder', ['class' => 'control-label']) }}
                {{ Form::text('diagnosa_sekunder', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('icd_x_diagnosa_sekunder', 'ICD X Diagnosa Sekunder', ['class' => 'control-label']) }}
                {{ Form::text('icd_x_diagnosa_sekunder', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('nama_kamar', 'Kamar *', ['class' => 'control-label']) }}
                <select class="form-control" name="nama_kamar">
                    @foreach($kosongs as $kosong)
                        <option value="{{ $kosong }}" id="nama_kamar" name="{{ $kosong }}">{{ $kosong }}</option>
                    @endforeach
                </select>
            </div>

            <br>

            {{ Form::submit('Simpan', ['class' => 'btn btn-outline-success float-right']) }}
        </div>

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('rawatinap::attribute.nav')
    <script>
        $(document).ready(function () {
            $('#id_pasien').select2({
                placeholder: "Masukkan nomor identitas pasien, seperti: 3578290101010001",
                minimumInputLength: 8,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/pasien/find',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
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
@endsection