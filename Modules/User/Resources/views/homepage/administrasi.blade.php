@extends('layouttemplate::master')

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
           <div class="col-md-12">
               <div class="page-header">
                   <h4>Administrasi Rawat Inap Pasien</h4>
                   <hr>
               </div>
               <a href="{{ route('ranap.create') }}" class="btn btn-outline-primary">Rawat Inap Baru</a>
           </div>
        </div>
    </div>
@endsection