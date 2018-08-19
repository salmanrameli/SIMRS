@if(Auth::user()->jabatan_id == 1)
    <li class="nav-item" id="manajemen_staff_jabatan" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('user.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-users-cog"></i> Manajemen Staff<span class="caret"></span></a>
    </li>
    <li class="nav-item" id="manajemen_dokter" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('dokter.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-user-md"></i> Manajemen Dokter</a>
    </li>
    <li class="nav-item" id="manajemen_data_pasien" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('pasien.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-heartbeat"></i> Manajemen Pasien</a>
    </li>
    <li class="nav-item" id="denah_ruangan" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('bangunan.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-hospital"></i> Manajemen Bangunan</a>
    </li>
    <li class="nav-item" id="manajemen_obat" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('obat.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-pills"></i> Manajemen Obat</a>
    </li>
    <li class="nav-item" id="manajemen_alkes" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('alat_kesehatan.index') }}" class="nav-link" style="min-width: 200px"><i class="fas fa-toolbox"></i> Manajemen<br>Alat Kesehatan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 2)
    <li class="nav-item" id="pasien_ranap" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('ranap.index') }}" class="nav-link"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
    </li>
    <li class="nav-item" id="denah_ruangan" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route('bangunan.index') }}" class="nav-link">Ruangan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 3)
    <li class="nav-item">
        <div class="btn-group">
            <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
        </div>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 4)
    <li class="nav-item">
        <div class="btn-group">
            <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap"><i class="fas fa-procedures"></i> Pasien Rawat Inap</a>
        </div>
    </li>
@endif