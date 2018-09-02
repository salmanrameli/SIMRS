@foreach($navigations as $navigation)
    <li class="nav-item" id="{{ $navigation->nav_id }}" style="border-bottom: 0.5px solid #d8dbdd; border-right: 0.5px solid #d8dbdd">
        <a href="{{ route($navigation->rute_home) }}" class="nav-link" style="min-width: 200px"><i class="{{ $navigation->icon }}"></i> {{ ucwords($navigation->nama_modul) }}</a>
    </li>
    @endforeach