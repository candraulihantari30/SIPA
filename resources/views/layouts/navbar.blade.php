i<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul>
        <li class="navbar-nav">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (Str::length(Auth::guard('krama')->user()) > 0)
                <img alt="image" src="{{ asset('storage/' .Auth::guard('krama')->user()->ft) }}" class="img-thumbnail">
                @elseif (Str::length(Auth::guard('prajuru')->user()) > 0)
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="img-thumbnail">

                @endif
                @if (Str::length(Auth::guard('krama')->user()) > 0)
                <div class="d-sm-none d-lg-inline-block">Selamat Datang, {{ Auth::guard('krama')->user()->nm }}</div>
                @elseif (Str::length(Auth::guard('prajuru')->user()) > 0)
                <div class="d-sm-none d-lg-inline-block">Selamat Datang, {{ Auth::guard('prajuru')->user()->nama_pegawai }}</div>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if (Str::length(Auth::guard('krama')->user()) > 0)
                <div class="dropdown-title">Hallo,{{ Auth::guard('krama')->user()->nm }}</div>
                @elseif (Str::length(Auth::guard('prajuru')->user()) > 0)
                <div class="dropdown-title">Hallo,{{ Auth::guard('prajuru')->user()->nama_pegawai }}</div>
                @endif

                @if (Str::length(Auth::guard('krama')->user()) > 0)
                <a href="{{ route('profil.detail', Auth::guard('krama')->user()->id) }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                @elseif (Str::length(Auth::guard('prajuru')->user()) > 0)
                <a href="{{ route('profil.detail', Auth::guard('prajuru')->user()->id) }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                @endif

                @if (Str::length(Auth::guard('krama')->user()) > 0)
                <a href="{{ route('edit.profil', Auth::guard('krama')->user()->id) }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
                @elseif (Str::length(Auth::guard('prajuru')->user()) > 0)
                @endif
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf

                    <button type="submit" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>