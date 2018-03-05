@extends('layouttemplate::pages')

@section('title')
    Ubah Data Akun
    @endsection

@section('content')
    <div class="card card-body">
        <h3>Ubah Data Akun</h3>
        <br>

        {{ Form::model($user, ['method' => 'PATCH', 'route' => ['setting.update', $user->id]]) }}

        <div class="form-group">
            {{ Form::label('nama', 'Nama', ['class' => 'control-label']) }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat', ['class' => 'control-label']) }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('telepon', 'Telepon', ['class' => 'control-label']) }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>

        @if($user->jabatan_id == '1')
            <label name="jabatan_id">Jabatan</label><br>
            @foreach($jabatans as $jabatan)
                <input type="radio" name="jabatan_id" value="{{ $jabatan->id }}" {{ $user->jabatan_id == $jabatan->id ? 'checked' : '' }} > {{ ucfirst($jabatan->nama )}}<br>
            @endforeach
            <br>
        @endif

        <br>

        {{ Form::submit('Simpan Perubahan', ['class' => 'btn btn-outline-success']) }}

        {{ Form::close() }}
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.setting')
@endsection