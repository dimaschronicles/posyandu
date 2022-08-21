<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <?php if (session('role') == 'admin') : ?>
                    <div class="sb-sidenav-menu-heading">Administrator</div>
                <?php elseif (session('role') == 'kader') : ?>
                    <div class="sb-sidenav-menu-heading">Kader</div>
                <?php elseif (session('role') == 'bidan') : ?>
                    <div class="sb-sidenav-menu-heading">Bidan</div>
                <?php endif; ?>
                <a class="nav-link <?= ($title == "Dashboard") ? 'active' : ''; ?>" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <?php if (session('role') == 'admin') : ?>
                    <a class="nav-link <?= ($title == "Data Petugas") ? 'active' : ''; ?>" href="/petugas">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Data Petugas
                    </a>
                <?php endif; ?>
                <a class="nav-link collapsed <?= ($title == "Imunisasi" || $title == "Vitamin") ? 'active' : ''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                    Data Master
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= ($title == "Imunisasi" || $title == "Vitamin") ? 'show' : ''; ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= ($title == "Imunisasi") ? 'active' : ''; ?>" href="/imunisasi">Data Imunisasi</a>
                        <a class="nav-link <?= ($title == "Vitamin") ? 'active' : ''; ?>" href="/vitamin">Data Vitamin</a>
                    </nav>
                </div>
                <a class="nav-link <?= ($title == "Data Ibu") ? 'active' : ''; ?>" href="/ibu">
                    <div class="sb-nav-link-icon"><i class="fas fa-female"></i></div>
                    Data Ibu
                </a>
                <a class="nav-link <?= ($title == "Data Balita") ? 'active' : ''; ?>" href="/balita">
                    <div class="sb-nav-link-icon"><i class="fas fa-baby"></i></div>
                    Data Balita
                </a>
                <div class="sb-sidenav-menu-heading">Layanan</div>
                <a class="nav-link <?= ($title == "Imunisasi Balita") ? 'active' : ''; ?>" href="/imunisasibalita">
                    <div class="sb-nav-link-icon"><i class="fas fa-syringe"></i></div>
                    Imunisasi Balita
                </a>
                <a class="nav-link <?= ($title == "Pemeriksaan Balita") ? 'active' : ''; ?>" href="/periksabalita">
                    <div class="sb-nav-link-icon"><i class="fas fa-child"></i></div>
                    Pemeriksaan Balita
                </a>
                <a class="nav-link <?= ($title == "Pemeriksaan Ibu Hamil") ? 'active' : ''; ?>" href="/periksaibu">
                    <div class="sb-nav-link-icon"><i class="fas fa-stethoscope"></i></div>
                    Pemeriksaan Ibu Hamil
                </a>
                <div class="sb-sidenav-menu-heading">Laporan</div>
                <!-- <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                    Kehadiran
                </a> -->
                <a class="nav-link collapsed <?= ($title == "Laporan Imunisasi Balita" || $title == "Laporan Pemeriksaan Balita" || $title == "Laporan Pemeriksaan Ibu Hamil") ? 'active' : ''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsLap" aria-expanded="false" aria-controls="collapseLayoutsLap">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                    Data Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= ($title == "Laporan Imunisasi Balita" || $title == "Laporan Pemeriksaan Balita" || $title == "Laporan Pemeriksaan Ibu Hamil") ? 'show' : ''; ?>" id="collapseLayoutsLap" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= ($title == "Laporan Imunisasi Balita") ? 'active' : ''; ?>" href="/laporan/imunisasibalita">Imunisasi Balita</a>
                        <a class="nav-link <?= ($title == "Laporan Pemeriksaan Balita") ? 'active' : ''; ?>" href="/laporan/periksabalita">Pemeriksaan Balita</a>
                        <a class="nav-link <?= ($title == "Laporan Pemeriksaan Ibu Hamil") ? 'active' : ''; ?>" href="/laporan/periksaibu">Pemeriksaan Ibu Hamil</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>