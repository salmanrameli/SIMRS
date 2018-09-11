@extends('layouttemplate::master')

@section('title')
    Manajemen Staff
@endsection

@section('content')
    <div class="card card-body">
        <form class="form-inline" action="{{ route('user.cari') }}" method="get">
            <label for="cari" class="control-label">Cari Staff: </label>
            &nbsp;&nbsp;
            <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">

            <div class="d-none d-sm-block">
                &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
            </div>

            <div class="d-sm-none">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
            </div>
        </form>
    </div>

    <div class="card card-body">
        <div class="table-responsive-sm">
            @if(Auth::user()->userCanCreate())
            <a class="btn btn-outline-primary" href="{{ route('user.create') }}">Daftarkan Staff Baru</a>
            @endif
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="d-none d-md-block">ID</th>
                        <th>Nama</th>
                        <th class="d-none d-md-block">Telepon</th>
                        <th>Jabatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="d-none d-md-block">{{ $user->id_user }}</td>
                        <td>{{ $user->nama }}</td>
                        <td class="d-none d-md-block">{{ $user->telepon }}</td>
                        <td>{{ ucfirst($user->jabatan->nama ) }}</td>
                        <td class="d-none d-lg-block">
                            <div class="btn-group">
                                @if(Auth::user()->userCanRead())
                                <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-info">Detail...</a>
                                @endif
                                @if(Auth::user()->userCanUpdate())
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('user.edit', ['id' => $user->id]) }}">Ubah</a>
                                </div>
                                    @endif
                            </div>
                        </td>
                        <td class="d-lg-none">
                            <div class="btn-group">
                                @if(Auth::user()->userCanRead())
                                <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-info">Detail..</a>
                                @endif
                                @if(Auth::user()->userCanUpdate())
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('user.edit', ['id' => $user->id]) }}">Ubah</a>
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination justify-content-end float-left">
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </div>
    </div>
@endsection

@section('script')
    @include('user::attribute.nav')
    @endsection
