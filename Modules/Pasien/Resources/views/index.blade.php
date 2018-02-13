@extends('layouttemplate::pages')

@section('title')
    Manajemen Pasien
@endsection

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <form class="form-inline" action="{{ route('pasien.cari') }}" method="get">
                <label for="cari" class="control-label">Cari Pasien: </label>
                &nbsp;&nbsp;
                <input type="text" class="form-control" id="query" name="query" placeholder="John Doe">
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
                   <th>KTP</th>
                   <th>Nama</th>
                   <th>Alamat</th>
                   <th></th>
               </tr>
               @foreach($pasiens as $pasien)
                   <tr>
                       <td>{{ $pasien->ktp }}</td>
                       <td>{{ $pasien->nama }}</td>
                       <td>{{ $pasien->alamat }}</td>
                       <td><a href="{{ route('pasien.show', ['id' => $pasien->id]) }}" class="btn btn-outline-info">Lihat</a></td>
                   </tr>
               @endforeach
           </table>
       </div>
    </div>
@stop
