<a href="/">Beranda</a>

@if(Auth::user()->jabatan_id == 1)
    <a href="{{ route('user.index') }}" id="manajemen_staff_jabatan">Manajemen Staff & Jabatan</a>
    <a href="{{ route('dokter.index') }}" id="manajemen_dokter">Manajemen Dokter</a>
    <a href="{{ route('pasien.index') }}" id="manajemen_data_pasien">Manajemen Data Pasien</a>
    <a href="{{ route('bangunan.index') }}" id="pengaturan_rumah_sakit">Manajemen Lantai & Kamar RS</a>
    @endif