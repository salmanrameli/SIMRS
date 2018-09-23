@extends('layouttemplate::master')

@section('title')
    Ubah Detail Rawat Inap: {{ $ranap->pasien->nama }}
    @endsection

@section('content')
    <div hidden>
        <p id="jenis_pembayaran" >{{ $ranap->pembayaran }}</p>
        <p id="jaminan_pembayaran">{{ $ranap->jaminan }}</p>
        <p id="hubungan_pembayaran">{{ $ranap->hubungan_penanggungjawab }}</p>
    </div>
    <div class="card">
        <div class="card-header">Identitas Pasien</div>
        <div class="card-body">
            {{ Form::model($ranap, ['method' => 'PATCH', 'route' => ['ranap.update', $ranap->id]]) }}

            <div class="form-group" hidden>
                {{ Form::label('id_rm', 'Nomor Rekam Medis *', ['class' => 'control-label']) }}
                {{ Form::text('id_rm', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group" hidden>
                {{ Form::label('id_pasien', 'ID Pasien', ['class' => 'control-label']) }}
                {{ Form::text('id_pasien', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label for="datepicker" id="tanggal_masuk_ranap" class="control-label">Tanggal Masuk *</label>
                <input type="text" id="datepicker" name="tanggal_masuk_ranap" class="form-control" value="{{ $ranap->tanggal_masuk }}">
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
                {{ Form::radio('pembayaran', 'jaminan', true) }}
                {{ Form::label('pembayaran', 'Bayar Jaminan (sebutkan)', ['class' => 'control-label']) }}
                {{ Form::text('jaminan', '', ['id' => 'bayar_jaminan', 'class' => 'form-control']) }}
                <hr>
                <h5>Tidak Mampu Bayar</h5>
                {{ Form::radio('pembayaran', 'angsuran', true) }}
                {{ Form::label('pembayaran', 'Angsuran (Rp......./ xx kali)', ['class' => 'control-label']) }}
                {{ Form::text('angsuran', '', ['id' => 'bayar_angsuran', 'class' => 'form-control', 'placeholder' => 'Rp......................................./.......................................']) }}
                <br>
                {{ Form::radio('pembayaran', 'bantuan lain', true) }}
                {{ Form::label('pembayaran', 'Bantuan lain (sebutkan)', ['class' => 'control-label']) }}
                {{ Form::text('bantuan_lain', '', ['id' => 'bayar_bantuan', 'class' => 'form-control']) }}
            </div>
            <hr>
            <div class="form-group">
                {{ Form::label('penanggungjawab_pembayaran', 'Nama Penanggung Jawab Pembayaran', ['class' => 'control-label']) }}
                {{ Form::text('penanggungjawab_pembayaran', ucwords($ranap->nama_penanggungjawab_pembayaran), ['class' => 'form-control']) }}
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
                {{ Form::radio('hubungan_penanggungjawab', 'lainnya', false, ['id' => 'lainnya']) }}
                {{ Form::label('hubungan_penanggungjawab', 'Lainnya (sebutkan)', false) }}
                {{ Form::text('hubungan_penanggungjawab_lainnya', null, ['id' => 'penanggungjawab_lainnya', 'class' => "form-control"]) }}
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
                        <option value="{{ $petugas->id }}" id="id_petugas_penerima" name="{{ $petugas->id }}" {{ $ranap->id_petugas_penerima == $petugas->id ? 'selected' : '' }}>{{ ucwords($petugas->nama) }}</option>
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
                        <option value="{{ $dokter->id }}" id="id_dokter_pj" name="{{ $dokter->id }}" {{ $ranap->id_dokter_pj == $dokter->id ? 'selected' : '' }}>{{ ucwords($dokter->nama) }}</option>
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
                        <option value="{{ $kosong }}" id="nama_kamar" name="{{ $kosong }}" {{ $ranap->nama_kamar == $kosong ? 'selected' : '' }}>{{ $kosong }}</option>
                    @endforeach
                </select>
            </div>

            <br>

            {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success float-right']) }}
        </div>

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('rawatinap::attribute.nav')
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        var pembayaran = $('#jenis_pembayaran').text();
        if(pembayaran === 'jaminan')
        {
            $('#bayar_jaminan').val($('#jaminan_pembayaran').text())
        }
        else if(pembayaran === 'angsuran')
        {
            $('#bayar_angsuran').val($('#jaminan_pembayaran').text())
        }
        else if(pembayaran === 'bantuan lain')
        {
            $('#bayar_bantuan').val($('#jaminan_pembayaran').text())
        }

        var pembayar = $('#hubungan_pembayaran').text();
        if(pembayar === "Suami" || pembayar === "Istri" || pembayar === "Anak" || pembayar === "Ayah" || pembayar === "Ibu")
        {

        }
        else
        {
            $('#lainnya').attr('checked', true);
            $('#penanggungjawab_lainnya').val(pembayar)
        }
    </script>
    @endsection