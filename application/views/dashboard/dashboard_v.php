<style>
    table,
    tr,
    td,
    th {
        text-align: center;

    }

    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 100%;
        font-weight: 00;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="feather icon-search"></i>Pencarian Data</button>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-success" type="button"><i class="feather icon-refresh-ccw"></i>Refresh</a>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="collapse multi-collapse mt-2" id="multiCollapseExample1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Berdasarkan Tempat</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url() . 'dashboard/cari' ?>" method="POST">
                                            <div class="form-group col-lg-12">
                                                <label for="varchar">Nama Tempat</label>
                                                <input type="text" class="form-control" name="nama_tempat" id="nama_tempat" placeholder="Nama Tempat" />
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Berdasarkan Kota</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url() . 'dashboard/cari' ?>" method="POST">
                                            <div class="form-group col-lg-12">
                                                <label for="int">Kota</label>
                                                <?php echo cmb_dinamis('id_kota', 'kota', 'nama_kota', 'id') ?>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Berdasarkan Jenis</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url() . 'dashboard/cari' ?>" method="POST">
                                            <div class="form-group col-lg-12">
                                                <label for="int">Jenis Wisata</label>
                                                <?php echo cmb_dinamis('id_jenis_wisata', 'jenis_wisata', 'nama_jenis_wisata', 'id') ?>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php
  
    foreach ($dashboard_wisata as $data) {
    ?>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="view overlay">
                    <a href="<?=base_url() . 'dashboard/read/' . $data->id_wisata ?>">
                        <img class="card-img-top" src="<?php echo base_url() . '/uploads/poster/' . $data->images ?>" alt="advance-5">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-header">
                    <span class="pcoded-mtext float-left">Nama Tempat : <a href="#"><?= $data->nama_tempat . ' - ' . ucfirst(strtolower($data->nama_kota)) ?></a></span>
                    <small class="float-right">Keterangan : <?= ($data->id_jenis_wisata) == 1 ? 'Berbayar' : 'Landscape (Gratis)' ?></small>
                </div>
            </div>
        </div>
    <?php  }
    ?>
</div>
<!-- <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Pemandu Wisata</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="row">
                    <?php
                    foreach ($wisata as $data) {
                    ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="thumbnail mb-4">
                                <div class="thumb">
                                    <a href="<?php //echo base_url() . '/uploads/poster/' . $data->images ?>" data-lightbox="1" data-title="<?= $data->nama_tempat ?>">
                                        <img src="<?php //echo base_url() . '/uploads/poster/' . $data->images ?>" alt="" class="img-fluid img-thumbnail" height="10%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php  }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="card">
    <div class="card-header">
        <h5>Tempat Wisata</h5>
        <div class="card-header-right">
            <div class="btn-group card-option">
                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                </button>
                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="dt-responsive table-responsive">
            <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA TEMPAT</th>
                        <th>ALAMAT</th>
                        <th>Aksi
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($wisata as $r) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= $r->nama_tempat ?>
                            </td>
                            <td>
                                <?= $r->alamat ?>
                            </td>
                            <td>
                                <?php echo anchor("dashboard/read/{$r->id}", "<i class='feather icon-eye'></i>Detail", ['class' => 'btn btn-sm btn-gradient-info']) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NAMA TEMPAT</th>
                        <th>ALAMAT</th>
                        <th>Aksi
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>