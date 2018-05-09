@if(Auth::user()->jabatan_id == 1)
    <li class="nav-item d-inline-block">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('user.index') }}" class="nav-link" id="manajemen_staff_jabatan" style="min-width: 200px">Manajemen Staff</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('user.create') }}" class="nav-link small">Daftarkan Staff Baru</a>
                <a href="{{ route('jabatan.create') }}" class="nav-link small">Buat Jabatan Baru</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('dokter.index') }}" class="nav-link" id="manajemen_dokter" style="min-width: 200px">Manajemen Dokter</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('dokter.create') }}" class="nav-link small">Daftarkan Dokter Baru</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('pasien.index') }}" class="nav-link" id="manajemen_data_pasien" style="min-width: 200px">Manajemen Pasien</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('pasien.create') }}" class="nav-link small">Daftarkan Pasien Baru</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('bangunan.index') }}" class="nav-link" id="pengaturan_rumah_sakit" style="min-width: 200px">Manajemen Bangunan</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('lantai.create') }}" class="nav-link small">Tambah Lantai Baru</a>
                <a href="{{ route('kamar.create') }}" class="nav-link small">Tambah Kamar Baru</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('obat.index') }}" class="nav-link" id="manajemen_obat" style="min-width: 200px">Manajemen Obat</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('obat.create') }}" class="nav-link small">Daftarkan Obat Baru</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('alat_kesehatan.index') }}" class="nav-link" id="manajemen_alkes" style="min-width: 200px">Manajemen<br>Alat Kesehatan</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('alat_kesehatan.create') }}" class="nav-link small">Tambah Alat Kesehatan Baru</a>
            </div>
        </div>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 2)
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap">Pasien Rawat Inap</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('ranap.pasien.create') }}" class="nav-link small">Daftarkan Pasien Baru</a>
                <a href="{{ route('ranap.create') }}" class="nav-link small">Daftarkan Rawat Inap Baru</a>
                <a href="{{ route('ranap.pasien.index') }}" class="nav-link small">Lihat Semua Pasien</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a href="{{ route('ranap.kamar') }}" class="nav-link" id="denah_ruangan">Ruangan</a>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 3)
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap">Pasien Rawat Inap</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('ranap.pasien.create') }}" class="nav-link small">Daftarkan Pasien Baru</a>
                <a href="{{ route('ranap.create') }}" class="nav-link small">Daftarkan Rawat Inap Baru</a>
                <a href="{{ route('ranap.pasien.index') }}" class="nav-link small">Lihat Semua Pasien</a>
            </div>
        </div>
    </li>
    @endif

@if(Auth::user()->jabatan_id == 4)
    <li class="nav-item">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropright</span>
            </button>
            <a href="{{ route('ranap.index') }}" class="nav-link" id="pasien_ranap">Pasien Rawat Inap</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('ranap.pasien.index') }}" class="nav-link small">Lihat Semua Pasien</a>
            </div>
        </div>
    </li>
@endif