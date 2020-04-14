<nav class="pcoded-navbar menupos-fixed ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="#" class="b-brand">
                <div class="b-bg">
                    E
                </div>

                <span class="b-title"><a href="<?= site_url('dashboard') ?>">EXPLORER</a></span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Navigasi</label>
                </li>
                <li data-username="home" class="nav-item"><a href="<?= site_url('home') ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">DASHBOARD</span></a></li>
                
                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">PEMANDU WISATA</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('travel_agent/index?q=1') ?>">Travel Agent</a></li>
                        <li><a href="<?= site_url('ahli?q=1') ?>">Profesional</a></li>
                    </ul>
                </li>
                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-camera"></i></span><span class="pcoded-mtext">PHOTOGRAPHER</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('travel_agent/index?q=2') ?>">Photo Studio</a></li>
                        <li><a href="<?= site_url('ahli?q=2') ?>">Profesional</a></li>
                    </ul>
                </li>

                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-map-pin"></i></span><span class="pcoded-mtext">TEMPAT WISATA</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('wisata/index?q=1') ?>">Berbayar</a></li>
                        <li><a href="<?= site_url('wisata/index?q=2') ?>">Landmark</a></li>
                        <li><a href="<?= site_url('wisata/index') ?>">Semua</a></li>
                    </ul>
                </li>
                <li data-username="animations" class="nav-item"><a href="<?= site_url('laporan') ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">LAPORAN</span></a></li>
            </ul>
        </div>
    </div>
</nav>