@foreach($navigations as $navigation)
    <li class="nav-item active">
        <a href="{{ route($navigation->rute_home) }}" class="nav-link" style="min-width: 200px"><i class="{{ $navigation->icon }}"></i> {{ ucwords($navigation->nama) }}</a>
    </li>
    <li class="dropdown-divider"></li>
@endforeach
<li class="nav-item active">
    <a href="{{ route('setting.index') }}" class="nav-link" style="margin-right: 10px"><i class="fa fa-cogs"></i> Pengaturan Akun</a>
</li>
<li class="dropdown-divider"></li>
<li class="nav-item active">
    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
</li>