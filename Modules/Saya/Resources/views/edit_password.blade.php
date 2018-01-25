@extends('saya::layouts.master')

@section('content')
    <h3>Ubah Password</h3>

    <form action="{{ route('saya.update_password') }}" method="post" role="form" class="form-horizontal">
        {{csrf_field()}}

        <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label">Password Lama</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="old">

                @if ($errors->has('old'))
                    <span class="help-block">
                        <strong>{{ $errors->first('old') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label">Password Baru</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-lg btn-outline-success">Simpan Perubahan</button>

    </form>


    @endsection