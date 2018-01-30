@extends('pasien::layouts.master')

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <form class="form-inline">
                <label for="cari" class="control-label">Cari Pasien: </label>
                &nbsp;&nbsp;
                <input type="text" class="form-control" id="cari" placeholder="John Doe">
                &nbsp;
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="card card-body">
       <div class="col-md-12">
           <a href="{{ route('pasien.create') }}" class="btn btn-outline-primary">Daftarkan Pasien Baru</a>
           <br>
           <br>
           <table class="table">
               <tr>
                   <th>ID</th>
                   <th>Nama</th>
                   <th>Tanggal Lahir</th>
                   <th>Alamat</th>
               </tr>
               @foreach($pasiens as $pasien)
                   <tr>
                       <td>{{ $pasien->id }}</td>
                       <td>{{ $pasien->nama }}</td>
                       <td>{{ $pasien->tanggal_lahir }}</td>
                       <td>{{ $pasien->alamat }}</td>
                   </tr>
               @endforeach
           </table>
       </div>
    </div>
@stop
