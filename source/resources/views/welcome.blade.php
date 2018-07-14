<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login</title>

        <!-- Styles -->
        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body style="background-image: url({{ asset('img/grey.png') }})">
        <div id="app">
            <div class="col-md-12">
                <div class="container-fluid" style="padding: 1.5% 10px 1.5% 10px">
                    <h2>Sistem Informasi Manajemen Rumah Sakit</h2>
                    <p class="lead">Silahkan login untuk melanjutkan</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="col-md-12">
                            @include('layouttemplate::alert')
                        </div>

                        <div class="card card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('id_user') ? ' has-error' : '' }}">
                                    <label for="id_user" class="col-md-10 offset-md-1 control-label">ID</label>

                                    <div class="col-md-10 offset-md-1">
                                        <input id="id_user" type="text" class="form-control" name="id_user" value="{{ old('id_user') }}" placeholder="12345" required autofocus>

                                        @if ($errors->has('id_user'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('id_user') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-10 offset-md-1 control-label">Password</label>

                                    <div class="col-md-10 offset-md-1">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <br>
                                <div class="form-group">
                                    <div class="col-md-10 offset-md-1">
                                        <button type="submit" class="btn btn-outline-success float-right">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>