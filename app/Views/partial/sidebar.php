<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Administrator</div>
                <a class="nav-link <?= ($title == "Dashboard") ? 'active' : ''; ?>" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Master Data</div>
                <a class="nav-link <?= ($title == "Data Balita") ? 'active' : ''; ?>" href="/balita">
                    <div class="sb-nav-link-icon"><i class="fas fa-child"></i></div>
                    Data Balita
                </a>
                <a class="nav-link <?= ($title == "Imunisasi") ? 'active' : ''; ?>" href="/imunisasi">
                    <div class="sb-nav-link-icon"><i class="fas fa-syringe"></i></div>
                    Data Imunisasi
                </a>
                <a class="nav-link <?= ($title == "Vitamin") ? 'active' : ''; ?>" href="/vitamin">
                    <div class="sb-nav-link-icon"><i class="fas fa-capsules"></i></div>
                    Data Vitamin
                </a>
                <div class="sb-sidenav-menu-heading">Layanan</div>
                <a class="nav-link <?= ($title == "Data Kehadiran") ? 'active' : ''; ?>" href="/kehadiran">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Data Kehadiran
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></i></div>
                    Penimbangan
                </a>
                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                    Kehadiran
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                    Penimbangan
                </a>
            </div>
        </div>
    </nav>
</div>