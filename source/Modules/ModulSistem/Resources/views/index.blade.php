@extends('layouttemplate::master')

@section('title')
    Manajemen Modul Sistem
    @endsection

@section('content')
    <div class="row">
        @foreach($moduls as $modul)
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ ucwords($modul->nama_modul) }}</b>
                    </div>
                    <div class="card-body">
                        <div class="float-right btn-group">
                            <button type="button" class="btn btn-outline-info">Tambah Hak Akses</button>
                            <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach($jabatans as $jabatan)
                                    <form action="{{ route('modul.add_hak_akses') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $modul->id }}" name="id_modul">
                                        <input type="hidden" value="{{ $jabatan->id }}" name="id_jabatan">
                                        <button type="submit" class="btn btn-link">{{ ucwords($jabatan->nama) }}</button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Hak Akses</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modul->jabatan as $akses)
                                <tr>
                                    <td>{{ ucwords($akses->nama) }}</td>
                                    <td>
                                        {{--<a href="" class="btn btn-danger float-right">Hapus</a>--}}
                                        {{ Form::open(['route' => ['modul.hapus_jabatan',  $modul->id,  $akses->id], 'method' => 'delete']) }}
                                        <button type="submit" class="btn btn-danger float-right">Hapus</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('script')
    @include('modulsistem::attribute.nav')
    @endsection
