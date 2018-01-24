<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h5 class="display-4">Fluid jumbotron</h5>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <div class="row">
                            <div class="col-4">
                                <div class="card card-body">
                                    <h5 class="card-title">Manajemen Akun Staff</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-body">
                                    <h5 class="card-title">Pengaturan Lantai Rumah Sakit</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-body">
                                    <h5 class="card-title">Pengaturan Kamar Rumah Sakit</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
