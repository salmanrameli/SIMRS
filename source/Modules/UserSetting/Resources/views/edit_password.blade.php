@extends('layouttemplate::master')

@section('title')
    Ubah Password Akun
@endsection

@section('content')
    <div class="card card-body">
        <h3>Ubah Password</h3>
        <br>
        <div class="col-md-12">
            <form action="{{ route('setting.update_password') }}" method="post" role="form" class="form-horizontal">
                {{csrf_field()}}

                <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password Lama</label>

                    <div class="row">
                        <input id="password" type="password" class="form-control" name="old">

                        @if ($errors->has('old'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password Baru</label>

                    <div class="row">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="control-label">Confirm Password</label>

                    <div class="row">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-outline-success">Simpan Perubahan</button>

            </form>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.setting')
@endsection