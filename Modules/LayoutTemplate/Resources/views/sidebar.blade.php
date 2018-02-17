<a href="/">Beranda</a>

@if(Auth::user()->jabatan_id == 1)
    <a href="{{ route('user.index') }}">Manajemen Staff & Jabatan</a>
    <a href="{{ route('pasien.index') }}">Manajemen Data Pasien</a>
    <a href="">Pengaturan Rumah Sakit</a>
    @endif

<a href="{{ route('setting.index') }}">Pengaturan Akun</a>
{{--<a href="{{ route('jabatan.index') }}">Pengelolaan Jabatan</a>--}}