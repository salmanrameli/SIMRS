<a href="/">Beranda</a>

@if(Auth::user()->jabatan_id == 1)
    <a href="{{ route('user.index') }}" id="manajemen_staff_jabatan">Manajemen Staff & Jabatan</a>
    <a href="{{ route('pasien.index') }}" id="manajemen_data_pasien">Manajemen Data Pasien</a>
    <a href="" id="pengaturan_rumah_sakit">Pengaturan Rumah Sakit</a>
    @endif

<a href="{{ route('setting.index') }}" id="pengaturan_akun">Pengaturan Akun</a>
