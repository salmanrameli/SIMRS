@extends('layouttemplate::master')

@section('title')
    Ubah Data Pasien
@endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            {{ Form::model($pasien, ['method' => 'PATCH', 'route' => ['pasien.update', 'id' => $pasien->id]]) }}

            <div class="form-group">
                {{ Form::label('ktp', 'KTP Pasien', ['class' => 'control-label']) }}
                {{ Form::text('ktp', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('nama', 'Nama Pasien', ['class' => 'control-label']) }}
                {{ Form::text('nama', null, ['class' => 'form-control']) }}
            </div>

            <label>Jenis Kelamin:</label>
            <div class="form-group form-inline">
                {{ Form::radio('jenkel', 'laki-laki', true, ['class' => 'form-control']) }}&nbsp;
                {{ Form::label('jenkel', 'Laki-laki', ['class' => 'control-label']) }}

                {{ Form::radio('jenkel', 'perempuan', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('jenkel', 'Perempuan', ['class' => 'control-label']) }}
            </div>

            <div class="form-group">
                {{ Form::label('nama_wali', 'Nama Suami/Ayah', ['class' => 'control-label']) }}
                {{ Form::text('nama_wali', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('alamat', 'Alamat', ['class' => 'control-label']) }}
                {{ Form::text('alamat', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']) }}
                {{ Form::date('tanggal_lahir', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('telepon', 'Telepon', ['class' => 'control-label']) }}
                {{ Form::text('telepon', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('pekerjaan', 'Pekerjaan', ['class' => 'control-label']) }}
                {{ Form::text('pekerjaan', null, ['class' => 'form-control']) }}
            </div>

            <label>Agama</label>
            <div class="form-group form-inline">
                {{ Form::radio('agama', 'islam', true) }}&nbsp;
                {{ Form::label('agama', 'Islam', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('agama', 'katolik', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('agama', 'Katolik', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('agama', 'protestan', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('agama', 'Protestan', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('agama', 'hindu', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('agama', 'Hindu', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('agama', 'buddha', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('agama', 'Buddha', ['class' => 'control-label']) }}
            </div>

            <label>Golongan Darah</label>
            <div class="form-group form-inline">
                {{ Form::radio('golongan_darah', 'A', true) }}&nbsp;
                {{ Form::label('golongan_darah', 'A', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('golongan_darah', 'B', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('golongan_darah', 'B', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('golongan_darah', 'AB', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('golongan_darah', 'AB', ['class' => 'control-label']) }}
                <br>
                {{ Form::radio('golongan_darah', 'O', false, ['class' => 'form-control', 'style' => 'margin-left:75px;']) }}&nbsp;
                {{ Form::label('golongan_darah', 'O', ['class' => 'control-label']) }}
            </div>

            <br>

            {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}
            {{ Form::close() }}
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.pasien')
@endsection