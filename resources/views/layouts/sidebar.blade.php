<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mb-5">
            <div class="d-flex justify-content-center align-items-center pt-3 pb-3">
                <img src="{{asset('assets/image/LogoD .png')}}" alt="logo" width="30%" class=" pr-3">
                <div>
                    <h5 class="text-left">SIPA</h5>
                    <h6>Adat Desa Temukus</h6>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">

            <!-- KRAMA -->
            @if (Str::length(Auth::guard('krama')->user()) > 0)
            @if (Auth::guard('krama')->user()->level = "krama")
            <li class="menu-header pt-6">BERANDA</li>
            <li class="nav-item dropdown {{ ($title === "Dashboard") ? 'active' : '' }} ">
                <a href="/beranda" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Beranda</span></a>
            </li>

            <li class="menu-header pt-6">DATA KELUARGA</li>
            <li class="nav-item dropdown {{ ($title === "Data Keluarga"||$title === "Tambah Data Keluarga"||$title === "Edit Data Krama"||$title === "Detail Data Krama") ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>
                    <span> Data Keluarga</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ($title === "Data Keluarga") ? 'active' : '' }}"><a class="nav-link" href="{{ route('keluarga.index')}}">Tampil Data</a></li>
                </ul>
            </li>

            <li class="menu-header pt-6">URUNAN</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-card" aria-hidden="true"></i>
                    <span> Data Urunan Wajib</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('iuran.index') }}">Tampil Data</a></li>
                </ul>
            </li>

            <li class="menu-header pt-6">Pamidande</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-card" aria-hidden="true"></i>
                    <span> Data Pamidande</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('rekap.krama') }}">Tampil Data</a></li>
                </ul>
            </li>
            @endif
            @endif

            <!-- PRAJURU -->
            @if (Str::length(Auth::guard('prajuru')->user()) > 0)
            @if (Auth::guard('prajuru')->user()->level == "prajuru")
            <li class="menu-header pt-6">DASHBOARD</li>
            <li class="nav-item dropdown {{ ($title === "Dashboard") ? 'active' : '' }} ">
                <a href="/dashboard" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a>
            </li>
            <!-- <ul class="dropdown-menu">
                    <li class="{{ ($title === "Dashboard") ? 'active' : '' }}"><a class="nav-link" href="/dashboard">Tampil</a></li>
                </ul> -->

            <li class="menu-header">Krama</li>
            <li class="nav-item dropdown {{ ($title === "Data Krama"||$title === "Tambah Data Krama"||$title === "Edit Data Krama"||$title === "Detail Data Krama") ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>
                    <span> Data Krama</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ($title === "Data Krama") ? 'active' : '' }}"><a class="nav-link" href="{{ route('krama.index')}}">Tampil Data</a></li>
                    <li class="{{ ($title === "Tambah Data Krama") ? 'active' : '' }}"><a class="nav-link" href="{{ route('krama.create')}}">Tambah Data</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ ($title === "Data Ketua Dadya"||$title === 'Tambah Data Ketua Dadya') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>
                    <span> Data Dadya</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ($title === "Data Ketua Dadya") ? 'active' : '' }}"><a class="nav-link" href="{{ route('Dadya.index')}}">Tampil Data</a></li>
                    <li class="{{ ($title === "Tambah Data Ketua Dadya") ? 'active' : '' }}"><a class="nav-link" href="{{ route('Dadya.create')}}">Tambah Data</a></li>
                </ul>
            </li>
            <li class="menu-header">Prajuru Desa Adat</li>
            <li class="nav-item dropdown {{ ($title === "Data Prajuru Desa Adat"||$title === "Tambah Prajuru Desa Adat"||$title === "Edit Prajuru Desa Adat") ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-book" aria-hidden="true"></i>
                    <span> Prajuru Desa Adat</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ($title === "Data Prajuru Desa Adat") ? 'active' : '' }}"><a class="nav-link" href="{{ route('prajuru.index') }}">Tampil Data</a></li>
                    <li class="{{ ($title === "Tambah Prajuru Desa Adat") ? 'active' : '' }}"><a class="nav-link" href="{{ route('prajuru.create')}}">Tambah Data</a></li>
                </ul>
            </li>
            <li class="menu-header">Nominal SIPA</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-card" aria-hidden="true"></i>
                    <span> Data SIPA</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('Urunan.index') }}">Tampil Data</a></li>

                </ul>
            </li>

            <li class="menu-header">Pembayaran & Transaksi</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-card" aria-hidden="true"></i>
                    <span> Data Pembayaran & Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('pembayaran') }}">Pembayaran</a></li>
                    <li><a class="nav-link" href="{{ route('data_transaksi') }}">Transaksi</a></li>
                </ul>
            </li>

            <li class="menu-header">Jadwal Kegiatan</li>
            <li class="nav-item dropdown {{ ($title === "Data Jadwal Kegiatan"||$title === "Tambah Data Jadwal Kegiatan") ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-window-maximize" aria-hidden="true"></i>
                    <span> Data Jadwal Kegiatan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ ($title === "Data Jadwal Kegiatan") ? 'active' : '' }}" href="{{ route('JadwalKegiatan.index') }}">Tampil Data</a></li>
                    <li><a class="nav-link {{ ($title === "Tambah Data Jadwal Kegiatan") ? 'active' : '' }}" href="{{ route('JadwalKegiatan.create') }}">Tambah Kegiatan</a></li>
                </ul>
            </li>

            <li class="menu-header">Rekap Data</li>
            <li class="nav-item dropdown {{ ($title === "Absensi Krama") }}">
                <a href="{{ route('absensi.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-list" aria-hidden="true"></i>
                    <span> Data Rekap Kehadiran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('rekap') }}">Tampil Data</a></li>
                </ul>
            </li>
            @elseif (Auth::guard('prajuru')->user()->level == "kelian_tempekan")
            <li class="menu-header pt-6">DASHBOARD</li>
            <li class="nav-item dropdown {{ ($title === "Dashboard") ? 'active' : '' }} ">
                <a href="/dashboard" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Penyakcak</li>
            <li class="nav-item dropdown {{ ($title === "Data Jadwal Kegiatan"||$title === "Tambah Data Jadwal Kegiatan") ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-window-maximize" aria-hidden="true"></i>
                    <span>Data Penyakcak</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ ($title === "Data Jadwal Kegiatan") ? 'active' : '' }}" href="{{ route('JadwalKegiatan.index') }}">Tampil Data</a></li>
                </ul>
            </li>

            <li class="menu-header">Rekap Data</li>
            <li class="nav-item dropdown {{ ($title === "Absensi Krama") }}">
                <a href="{{ route('absensi.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-list" aria-hidden="true"></i>
                    <span> Data Rekap Penyakcak</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('rekap') }}">Tampil Data</a></li>
                </ul>
            </li>
            @endif
            @endif

            <!-- <ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                        Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </div>
            </ul> -->
        </ul>
    </aside>
</div>