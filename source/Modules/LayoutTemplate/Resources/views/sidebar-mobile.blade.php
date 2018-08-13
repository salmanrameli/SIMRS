@if(Auth::user()->jabatan_id == 1)
    <li class="nav-item active">
        <a href="{{ route('user.index') }}" class="nav-link" id="manajemen_staff_jabatan" style="min-width: 200px"><i class="fas fa-users-cog"></i> Manajemen Staff</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('dokter.index') }}" class="nav-link" id="manajemen_dokter" style="min-width: 200px"><i class="fas fa-user-md"></i> Manajemen Dokter</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('pasien.index') }}" class="nav-link" id="manajemen_data_pasien" style="min-width: 200px"><i class="fas fa-heartbeat"></i> Manajemen Pasien</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('bangunan.index') }}" class="nav-link" id="denah_ruangan" style="min-width: 200px"><i class="fas fa-hospital"></i> Manajemen Bangunan</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('obat.index') }}" class="nav-link" id="manajemen_obat" style="min-width: 200px"><i class="fas fa-pills"></i> Manajemen Obat</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('alat_kesehatan.index') }}" class="nav-link" id="manajemen_alkes" style="min-width: 200px"><i class="fas fa-toolbox"></i> Manajemen Alat Kesehatan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 2)
    <li class="nav-item active">
        <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="nav-item active">
        <a href="{{ route('bangunan.index') }}" class="nav-link" id="denah_ruangan">Ruangan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 3)
    <li class="nav-item active">
        <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 4)
    <li class="nav-item active">
        <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
    </li>
    @endif

<li class="dropdown-divider"></li>
<li class="nav-item active">
    <a href="{{ route('setting.index') }}" class="nav-link" style="margin-right: 10px"><i class="fa fa-cogs"></i> Pengaturan Akun</a>
</li>
<li class="dropdown-divider"></li>
<li class="nav-item active">
    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
</li>