<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Module User</title>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h5 class="display-4">Fluid jumbotron</h5>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    @foreach($errors->all() as $error)
                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(Session::has('warning'))
                <div class="alert alert-warning alert-dismissable">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('warning') }}
                </div>
            @endif
            <div class="row">
                <div class="col-3">
                    <div class="card card-body">
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-light" href="/">Beranda</a>
                            <a class="list-group-item list-group-item-primary" href="{{ route('user.index') }}">Manajemen Akun Staff</a>
                            <a class="list-group-item list-group-item-light">Pengaturan Lantai RS</a>
                            <a class="list-group-item list-group-item-light">Pengaturan Kamar RS</a>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="card card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('bootstrap/js/app.js') }}"></script>
    </body>
</html>
