<style>
/* ==========================================
   NAVBAR DASHBOARD
========================================== */

.navbar{
    min-height:90px;
    background:#fff !important;
    box-shadow:0 2px 15px rgba(0,0,0,.08) !important;
}

.navbar-brand{
    display:flex;
    align-items:center;
}

.navbar-brand img{
    width:56px;
    height:auto;
}

.navbar-brand .fs-2{
    font-size:2rem !important;
    font-weight:800;
    line-height:1;
}

.navbar-brand small{
    font-size:15px;
}

.navbar-nav{
    gap:10px;
}

.nav-modern{
    display:flex;
    align-items:center;
    gap:7px;
    padding:.7rem 1rem !important;
    color:#555 !important;
    font-weight:600;
    border-radius:10px;
    transition:.25s;
}

.nav-modern:hover{
    color:#ff9800 !important;
}

.nav-modern.active{
    color:#ff9800 !important;
}

.user-button{
    background:#ffb300;
    color:#fff !important;
    padding:8px 18px !important;
    border-radius:30px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:10px;
}

.user-button:hover{
    background:#ff9800;
}

.user-button img{
    object-fit:cover;
}

.user-button::after{
    margin-left:6px;
}

.dropdown-menu{
    border-radius:14px;
}

.dropdown-item{
    padding:.7rem 1rem;
}

.dropdown-item:hover{
    background:#fff4e5;
    color:#ff9800;
}
</style>

<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top">

    <div class="container-fluid px-4 px-lg-5">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('dashboard') }}">

            <img src="{{ asset('images/smk.png') }}"
                 alt="Logo"
                 style="width:56px;height:auto;">

            <div class="ms-3">

                <div class="fw-bold fs-2">
                    Inven<span class="text-warning">Bar</span>
                </div>

                <small class="text-muted">
                    Sistem Inventaris
                </small>

            </div>

        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            {{-- Menu --}}
            <ul class="navbar-nav mx-auto">

                @php

                   $navs = [
    ['Dashboard', 'dashboard', 'bi-grid'],
    ['Barang', 'barang.index', 'bi-box-seam'],
    ['Lokasi', 'lokasi.index', 'bi-geo-alt'],
    ['Kategori', 'kategori.index', 'bi-tag'],
    ['Perbaikan', 'laporan-perbaikan.index', 'bi-tools'],
];

                    if(auth()->check() && auth()->user()->hasRole('admin')){
                        $navs[] = ['User','user.index','bi-people'];
                    }

                @endphp

                @foreach($navs as $nav)

                    <li class="nav-item">

                        <a href="{{ route($nav[1]) }}"
                           class="nav-link nav-modern {{ request()->routeIs($nav[1]) ? 'active' : '' }}">

                            <i class="bi {{ $nav[2] }}"></i>

                            <span>{{ $nav[0] }}</span>

                        </a>

                    </li>

                @endforeach

            </ul>

            {{-- User --}}
            @auth

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle user-button"
                           href="#"
                           data-bs-toggle="dropdown">

                            @if(Auth::user()->foto)

                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                     alt="Foto Profil"
                                     width="38"
                                     height="38"
                                     class="rounded-circle border border-2 border-white">

                            @else

                                <div class="rounded-circle bg-white text-warning fw-bold d-flex align-items-center justify-content-center"
                                     style="width:38px;height:38px;">

                                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                                </div>

                            @endif

                            <span>{{ Auth::user()->name }}</span>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('profile.edit') }}">

                                    <i class="bi bi-person me-2"></i>

                                    Profile

                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form method="POST"
                                      action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item">

                                        <i class="bi bi-box-arrow-right me-2"></i>

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                </ul>

            @endauth

        </div>

    </div>

</nav>