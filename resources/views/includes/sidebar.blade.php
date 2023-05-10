<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ ($active === "Dashboard") ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                {{-- MANAJER --}}
                @can('manajer')
                    <div class="sb-sidenav-menu-heading">Operator</div>
                <a class="nav-link collapsed {{ ($active === "Pegawai") ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pegawai" aria-expanded="false" aria-controls="pegawai">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Operator/Pegawai
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pegawai" aria-labelledby="headingOne" data-bs-parent="#pegawai">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ ($active === "Pegawai") ? 'active' : '' }}" href="/pegawai">Data Pegawai</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Data</div>

                <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collaps2" aria-expanded="false" aria-controls="collaps2">
                    <div class="sb-nav-link-icon "><i class="fas fa-users"></i></div>
                    Motor
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collaps2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="/motor">
                            Data Motor
                        </a>
                    </nav>
                </div>
                <div class="collapse" id="collaps2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="/pengeluaran">
                            Data Pengeluaran
                        </a>
                    </nav>
                </div>
                @endcan
                
                {{-- OWNER / PEMILIK --}}
                @can('owner')
                    <div class="sb-sidenav-menu-heading">Operator</div>
                <a class="nav-link collapsed {{ ($active === "Pegawai") ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pegawai" aria-expanded="false" aria-controls="pegawai">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Operator/Pegawai
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pegawai" aria-labelledby="headingOne" data-bs-parent="#pegawai">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ ($active === "Pegawai") ? 'active' : '' }}" href="{{route('pegawai.index')}}">Data Pegawai</a>
                    </nav>
                </div>
                @endcan

                {{-- OPERATOR --}}
                @can('operator')
                        <div class="sb-sidenav-menu-heading">Data</div>

                    <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collaps2" aria-expanded="false" aria-controls="collaps2">
                        <div class="sb-nav-link-icon "><i class="fas fa-users"></i></div>
                        Motor
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collaps2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="/motors">
                                Data Motor
                            </a>
                        </nav>
                    </div>
                    <div class="collapse" id="collaps2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed {{ ($active === "Motor") ? 'active' : '' }}" href="/pengeluarans">
                                Data Pengeluaran
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed {{ ($active === "Penyewa") ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon "><i class="fas fa-users"></i></div>
                        Penyewa
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed {{ ($active === "Penyewa") ? 'active' : '' }}" href="{{ route('penyewa.index') }}">
                                Data Penyewa
                            </a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Transaksi</div>
                    <a class="nav-link {{ ($active === "Transaksi") ? 'active' : '' }}" href="{{ route('transaksi.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                        Transaksi
                    </a>
                @endcan
                

            </div>
        </div>
    </nav>
</div>
