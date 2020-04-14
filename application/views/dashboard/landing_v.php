<!DOCTYPE html>
<html lang="en">



<head>
    <title>Tour Guide</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />
    <?php $this->load->view('template_frontend/css') ?>
    <style>
        .carousel-item {
            height: 80vh;
            width: 100%;
            min-height: 250px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <nav class="pcoded-navbar theme-horizontal menu-light icon-colored">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Datta Able</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Tempat Wisata</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('dashboard/berbayar/1') ?>">Berbayar</a></li>
                            <li><a href="<?= base_url('dashboard/berbayar/2') ?>">Landscape (Gratis)</a></li>
                            <li><a href="<?= base_url('dashboard') ?>">Semua</a></li>
                        </ul>
                    </li>
                    <li data-username="widget Statistic Data Table User card Chart" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Pemandu Wisata</span><span class="pcoded-badge label label-info">100+</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('dashboard_pemandu') ?>">Profesional</a></li>
                            <li><a href="<?= base_url('dashboard_agent') ?>">Travel Agent</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Photographer</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('dashboard_photographer') ?>">Profesional</a></li>
                            <li><a href="<?= base_url('dashboard_studio') ?>">Studio Photo</a></li>
                        </ul>
                    </li>
                    <li data-username="advance components Alert gridstack lightbox modal notification pnotify rating rangeslider slider syntax highlighter Tour Tree view Nestable Toolbar" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-gitlab"></i></span><span class="pcoded-mtext">Informasi</span></a>

                    </li>
                    <li data-username="extra components Session Timeout Session Idle Timeout Offline" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Tentang Kami</span></a>
                    </li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Chart & Maps</label>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php $this->load->view('template_frontend/header') ?>
    <div class="main" id="main">
        <div class="hero-section app-hero">
            <div class="container-fluid">
                <div class="hero-content app-hero-content text-center">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <h1 class="wow fadeInUp" data-wow-delay="0s">SELAMAT DATANG DI TRAVELER EXPLORER</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                Website yang menyediakan informasi travel di wilayah Tanjungpinang dan sekitarnya.<br class="hidden-xs"> pilihan terbaik untuk destinasi anda.
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php
                                    $i = 0;
                                    foreach ($dashboard_wisata as $data) {
                                    ?>
                                        <?php
                                        if ($i == 0) {  ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i++ ?>" class="active"></li>

                                        <?php    } else { ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i++ ?>"></li>

                                        <?php    }  ?>

                                    <?php
                                    } ?>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <!-- Slide One - Set the background image for this slide in the line below -->
                                    <?php
                                    $j = 0;
                                    foreach ($dashboard_wisata as $data) {
                                    ?>
                                        <?php

                                        if ($j == 0) {  ?>
                                            <div class="carousel-item active <?= $j++ ?>" style="background-image: url('<?php echo base_url() . 'uploads/poster/' . $data->images ?>')">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h2 class="display-4"><?= $data->nama_tempat ?></h2>
                                                    <p class="lead"><?= ucfirst(strtolower($data->nama_kota)) ?></p>
                                                </div>
                                            </div>
                                        <?php    } else { ?>
                                            <div class="carousel-item" style="background-image: url('<?php echo base_url() . 'uploads/poster/' . $data->images ?>')">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h2 class="display-4"><?= $data->nama_tempat ?></h2>
                                                    <p class="lead"><?= ucfirst(strtolower($data->nama_kota)) ?></p>
                                                </div>
                                            </div>

                                        <?php  }  ?>
                                    <?php
                                    } ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="flex-features" id="features">
            <div class="container">
                <div class="flex-split">
                    <div class="f-left wow fadeInUp" data-wow-delay="0s">
                        <div class="left-content">
                           
                            <img class="img-fluid" src="<?php echo base_url() . '/assets/backend/template/assets/images/' ?>feature_1.png" alt="" />
                        </div>
                    </div>
                    <div class="f-right wow fadeInUp" data-wow-delay="0.2s">
                        <div class="right-content">
                            <h2>Profesional Photographer</h2>
                            <p>
                                Para Photographer profesional yang telah berpengelaman
                            </p>
                            <ul>
                                <li><i class="feather icon-check"></i>Foto Pemandangan</li>
                                <li><i class="feather icon-check"></i>Foto Olah Ragapemandangan alam</li>
                                <li><i class="feather icon-check"></i>Foto Weding</li>
                                <li><i class="feather icon-check"></i>Foto Perpisahan</li>
                                <li><i class="feather icon-check"></i>Wisuda</li>
                                <li><i class="feather icon-check"></i>Dll</li>
                            </ul>
                            <a href="<?=base_url('dashboard_photographer')?>" class="btn btn-primary btn-action btn-fill">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="flex-split">
                    <div class="f-right">
                        <div class="right-content wow fadeInUp" data-wow-delay="0.2s">
                            <h2>Travel Agent Terpercaya</h2>
                            <p>
                                Memberikan kenyamanan pada perjalanan anda
                            </p>
                            <ul>
                                <li><i class="feather icon-check"></i>Tanjungpinang</li>
                                <li><i class="feather icon-check"></i>Batam</li>
                                <li><i class="feather icon-check"></i>Bintan</li>
                                <li><i class="feather icon-check"></i>Lingga</li>
                                <li><i class="feather icon-check"></i>Anambas</li>
                                <li><i class="feather icon-check"></i>Dll</li>
                            </ul>
                            <a href="<?=base_url('dashboard_agent')?>" class="btn btn-primary btn-action btn-fill">Lihat Selengkapnya</a>
                     
                        </div>
                    </div>
                    <div class="f-left">
                        <div class="left-content wow fadeInUp" data-wow-delay="0.3s">
                            <img class="img-fluid" src="<?php echo base_url() . '/assets/backend/template/assets/images/' ?>feature_2.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

   
        <div class="cta-sub text-center no-color">
            <div class="container">
                <h1 class="wow fadeInUp" data-wow-delay="0s">Hubungi Kami</h1>
                <p class="wow fadeInUp" data-wow-delay="0.2s">
                   Kami akan memberikan update tebaik untuk destinasi anda
                </p>
                <div class="form wow fadeInUp" data-wow-delay="0.3s">
                    <form class="subscribe-form wow zoomIn" action="http://www.youtube.com/channel/UCIk9ZQcxcFCAI6pdHT-xNTw?sub_confirmation=1" method="post" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
                        <input class="mail" type="email" name="email" placeholder="Email address" autocomplete="off"><input class="submit-button" type="submit" value="Subscribe">
                    </form>
                    <div class="success-message"></div>
                    <div class="error-message"></div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="col-md-12 text-center">
                    <img src="<?php echo base_url() . '/assets/backend/template/assets/images/' ?>logo.png" alt="The Explorer Team" />
                    <ul class="footer-menu">
                        <li><a href="#!">Site</a></li>
                        <li><a href="#!">Support</a></li>
                        <li><a href="#!">Terms</a></li>
                        <li><a href="#!">Privacy</a></li>
                    </ul>
                    <div class="footer-text">
                        <p>
                            Copyright © 2020 The Explorer Team Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <a id="back-top" class="back-to-top page-scroll" href="#main">
            <i class="ion-ios-arrow-thin-up"></i>
        </a>

    </div>

    </div>
    <?php $this->load->view('template_frontend/js') ?>
</body>

</html>