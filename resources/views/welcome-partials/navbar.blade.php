<style>
/* ==========================================
   NAVBAR
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
    width:58px;
    height:auto;
}

.navbar-nav{
    gap:10px;
}

.nav-modern{
    display:flex;
    align-items:center;
    gap:8px;
    padding:.7rem 1rem !important;
    color:#555 !important;
    font-weight:600;
    border-radius:10px;
    transition:.25s;
    text-decoration:none;
}

.nav-modern i{
    font-size:15px;
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

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">

    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('dashboard') }}">

            <img src="{{ asset('images/smk.png') }}"
                 alt="Logo SMKN 1 Padaherang"
                 class="me-3">

            <div>

                <h4 class="mb-0 fw-bold">
                    <span class="text-dark">Inven</span><span class="text-warning">Bar</span>
                </h4>

                <small class="text-muted">
                    Sistem Inventaris
                </small>

            </div>

        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Menu --}}
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link nav-modern {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('barang.index') }}"
                       class="nav-link nav-modern {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Barang</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('lokasi.index') }}"
                       class="nav-link nav-modern {{ request()->routeIs('lokasi.*') ? 'active' : '' }}">
                        <i class="bi bi-geo-alt"></i>
                        <span>Lokasi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                       class="nav-link nav-modern {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                        <i class="bi bi-tag"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                @auth
                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}"
                               class="nav-link nav-modern {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                <i class="bi bi-people"></i>
                                <span>User</span>
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>

            {{-- User / Login --}}
            @if(Route::has('login'))

                @auth

                    <div class="dropdown">

                        <a href="#"
                           class="btn user-button dropdown-toggle"
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

                    </div>

                @else

                    <a href="{{ route('login') }}"
                       class="btn btn-warning rounded-pill px-4 fw-semibold text-white">

                        <i class="bi bi-box-arrow-in-right me-2"></i>

                        Masuk

                    </a>

                @endauth

            @endif

        </div>

    </div>

</nav>