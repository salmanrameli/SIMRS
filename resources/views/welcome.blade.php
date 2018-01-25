<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SIMRS – Login</title>

        <!-- Styles -->
        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div id="app">
            <div class="container-fluid">
                <div class="row" style="padding-top: 10%">
                    <div class="col-md-10 offset-md-1">
                        <div class="card card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                    <label for="id" class="col-md-10 offset-md-1 control-label">ID</label>

                                    <div class="col-md-10 offset-md-1">
                                        <input id="id" type="text" class="form-control" name="id" value="{{ old('id') }}" placeholder="12345" required autofocus>

                                        @if ($errors->has('id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('id') }}</strong>
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
                                        <button type="submit" class="btn btn-lg btn-outline-primary">
                                            Login
                                        </button>

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