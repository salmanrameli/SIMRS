@extends('layouttemplate::master')

@section('title')
    Registrasi Pasien
@endsection

@section('content')
    <div class="card card-body">
        <p style="color: red">* = wajib diisi</p>
        {{ Form::open(['route' => 'pasien.store']) }}

        <div class="form-group">
            {{ Form::label('id_penduduk_pasien', 'ID Penduduk Pasien (KTP/SIM/Paspor) *', ['class' => 'control-label']) }}
            {{ Form::text('id_penduduk_pasien', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama', 'Nama Pasien *', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <label>Jenis Kelamin: *</label><br>
        <div class="form-group">
            {{ Form::radio('jenkel', 'laki-laki', true) }}&nbsp;
            {{ Form::label('jenkel', 'Laki-laki', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('jenkel', 'perempuan', false) }}&nbsp;
            {{ Form::label('jenkel', 'Perempuan', ['class' => 'control-label']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama_wali', 'Nama Suami/Ayah', ['class' => 'control-label']) }}
            {{ Form::text('nama_wali', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat *', ['class' => 'control-label']) }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label for="datepicker" id="tanggal_lahir" class="control-label">Tanggal Lahir *</label>
            <input type="text" id="datepicker" name="tanggal_lahir" class="form-control">
        </div>

        <div class="form-group">
            {{ Form::label('telepon', 'Telepon *', ['class' => 'control-label']) }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('pekerjaan', 'Pekerjaan', ['class' => 'control-label']) }}
            {{ Form::text('pekerjaan', null, ['class' => 'form-control']) }}
        </div>

        <label>Agama *</label>
        <div class="form-group">
            {{ Form::radio('agama', 'islam', true) }}&nbsp;
            {{ Form::label('agama', 'Islam', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('agama', 'katolik', false) }}&nbsp;
            {{ Form::label('agama', 'Katolik', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('agama', 'protestan', false) }}&nbsp;
            {{ Form::label('agama', 'Protestan', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('agama', 'hindu', false) }}&nbsp;
            {{ Form::label('agama', 'Hindu', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('agama', 'buddha', false) }}&nbsp;
            {{ Form::label('agama', 'Buddha', ['class' => 'control-label']) }}
        </div>

        <label>Golongan Darah *</label>
        <div class="form-group">
            {{ Form::radio('golongan_darah', 'A', true) }}&nbsp;
            {{ Form::label('golongan_darah', 'A', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'B', false) }}&nbsp;
            {{ Form::label('golongan_darah', 'B', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'AB', false) }}&nbsp;
            {{ Form::label('golongan_darah', 'AB', ['class' => 'control-label']) }}
            <br>
            {{ Form::radio('golongan_darah', 'O', false) }}&nbsp;
            {{ Form::label('golongan_darah', 'O', ['class' => 'control-label']) }}
        </div>

        <br>

        {{ Form::submit('Simpan Pasien', ['class' => 'btn btn-outline-success float-right']) }}
        {{ Form::close() }}
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    @if(Auth::user()->jabatan_id == 1)
        @include('layouttemplate::attributes.pasien')
    @else
        @include('layouttemplate::attributes.pasien_ranap')
    @endif
@endsection