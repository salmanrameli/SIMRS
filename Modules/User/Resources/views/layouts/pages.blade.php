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
            <h1 class="display-6">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card card-header">
                Card Header
            </div>
            <div class="card card-body">

            </div>
            <div class="card card-footer">
                Card footer
            </div>
        </div>
        <div class="col-9">
            <div class="card card-body">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
