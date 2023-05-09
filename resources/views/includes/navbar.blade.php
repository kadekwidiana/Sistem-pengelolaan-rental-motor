<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Rental Motor</a>
    <!-- Sidebar Toggle-->
    <button class="order-1 btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($active === "Profile") ? 'active' : '' }}" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">@if (Auth::check())
                {{ Auth::user()->nama_pegawai }}
            @endif<i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Edit Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('change-password') }}">Ganti Password</a></li>
                <li><hr class="dropdown-divider" /></li>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <li><a class="dropdown-item" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a></li>
                </form>
            </ul>
        </li>
    </ul>
</nav>