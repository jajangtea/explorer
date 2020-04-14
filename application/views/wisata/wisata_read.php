<style>
    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        height: auto;
        min-width: auto;
        max-width: auto;
        max-height: 550px;
        min-height: 500px;
    }

    ximg {
        left: 0px;
    }

    .imgA1 {
        height: 100%;
        position: relative;
        width: 100%;
        z-index: 3;
    }

    .pembicara {
        max-height: 80px;
        min-width: 80px;
        min-height: 80px;
        height: auto;
    }

    .card-pembicara {
        min-height: 450px;
    }

    .sponsor {
        max-height: 50px;
    }

    .sampul {
        max-height: 200px;
        min-height: 200px;
        min-width: 320px;
        max-width: 320px;
    }
</style>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?= $title ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $parent ?></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $title ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" style="height:630px;">
            <div class="card-body text-center">
                <a href="<?php echo base_url() ?>uploads/poster/<?= $images ?>" data-lightbox="6" data-title="<?= $nama_tempat ?>">
                    <img class="img-fluid img-thumbnail" src="<?php echo base_url() ?>uploads/poster/<?= $images ?>" alt="tempat_wisata">
                </a>
                <p><?= $nama_tempat ?></p>
                <h3><?= $alamat ?></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="height:300px;">
            <div class="card-header">
                <h5><?= $title ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a class="btn btn-outline-primary btn-icon" href="#!" role="button"><i class="fas fa-at"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="chat-header">NAMA TEMPAT</div>
                                <p class="chat-header text-muted"><?= $nama_tempat ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a class="btn btn-outline-warning btn-icon" href="#!" role="button"><i class="fas fa-calendar"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="chat-header">ALAMAT</div>
                                <p class="chat-header text-muted"><?= $alamat ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a class="btn btn-outline-danger btn-icon" href="#!" role="button"><i class="fas fa-list"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="chat-header">JENIS WISATA</div>
                                <p class="chat-header text-muted"><?= $id_jenis_wisata ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a class="btn btn-outline-success btn-icon" href="#!" role="button"><i class="fas fa-map"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="chat-header">KOTA</div>
                                <p class="chat-header text-muted"><?= $id_kota ?></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="height:300px;">
            <div class="card-header">
                <h5>Keterangan</h5>
            </div>
            <div class="col-sm-12">
                <div class="media">
                    <div class="media-body">
                        <p class="chat-header text-muted"><?= $keterangan ?></p>
                    </div>
                </div>
            </div>>

        </div>
    </div>
</div>