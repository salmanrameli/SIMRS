<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid" style="background-color: white">
            <div class="container">
                {{--<h5 class="display-4">Fluid jumbotron</h5>--}}
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img class="img-fluid mx-auto" src="{{ asset('img/users.png') }}" alt="Users">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Akun Staff</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-body">
                                <img class="img-fluid mx-auto" src="{{ asset('img/hospital.png') }}" alt="Users">
                                <h5 class="card-title">Pengaturan Rumah Sakit</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="" class="btn btn-outline-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <img class="img-fluid mx-auto" src="{{ asset('img/cog.png') }}" alt="Users">
                                <div class="card-body">
                                    <h5 class="card-title">Pengaturan Akun</h5>
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
