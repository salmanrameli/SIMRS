<div class="d-lg-none">
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px; border-bottom: solid 1px darkgray">
        <a class="navbar-brand" href="/"><img src="{{ asset('/storage/logo.jpg') }}" width="35" height="35" alt="logo"><small style="font-size: 12px;"> @ {{ Auth::user()->nama }} – {{ $role }}</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @include('layouttemplate::sidebar-mobile')
            </ul>
        </div>
    </nav>
</div>
<div class="d-none d-lg-block" style="padding-bottom: 80px">
    <nav class="navbar navbar-light bg-white fixed-top"  style="margin-bottom: 20px; border-bottom: 1px solid darkgray;">
        <a class="navbar-brand" href="/"><img src="{{ asset('/storage/logo.jpg') }}" width="35" height="35" alt="logo">&nbsp;&nbsp;{{ $sistem }} | <small style="font-size: 14px">{{ Auth::user()->nama }} – {{ $role }}</small></a>
        <div class="float-right">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <a href="{{ route('setting.index') }}" class="btn btn-outline-info float-right" style="margin-right: 10px"><i class="fa fa-cogs"></i> Pengaturan Akun</a>
        </div>
    </nav>
</div>