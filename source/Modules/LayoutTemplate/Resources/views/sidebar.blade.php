<li class="nav-item">
    <a href="/" id="beranda">Beranda</a>
</li>

@if(Auth::user()->jabatan_id == 1)
    <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link" id="manajemen_staff_jabatan">Manajemen Staff</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('dokter.index') }}" class="nav-link" id="manajemen_dokter">Manajemen Dokter</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('pasien.index') }}" class="nav-link" id="manajemen_data_pasien">Manajemen Pasien</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('bangunan.index') }}" class="nav-link" id="pengaturan_rumah_sakit">Manajemen Bangunan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 2)
    <li class="nav-item">
        <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap">Pasien Rawat Inap</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('ranap.kamar') }}" class="nav-link" id="denah_ruangan">Ruangan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 3)
    <li class="nav-item">
        <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap">Pasien Rawat Inap</a>
    </li>
    @endif