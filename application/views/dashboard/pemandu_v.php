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
        <a href="<?= base_url('dashboard_pemandu') ?>" class="btn btn-success" type="button"><i class="feather icon-refresh-ccw"></i>Refresh</a>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="collapse multi-collapse mt-2" id="multiCollapseExample1">
                    <div class="card-body">

                        <form action="<?= base_url() . 'dashboard_pemandu/cari' ?>" method="POST">
                            <div class="form-group col-lg-12">
                                <label for="varchar">Nama :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pemandu Wisata Profesional" />
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

<div class="row">
    <?php
    foreach ($pemandu as $data) {
    ?>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="view overlay">
                    <a href="https://www.google.com/">
                        <img class="card-img-top" src="<?php echo base_url() . 'uploads/ahli/' . $data->profil ?>" alt="advance-5">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-header">
                    <small> <span class="pcoded-mtext float-left">Nama : <a href="#"><?= ucfirst(strtolower($data->nama)) . '(' . $data->umur . ')' ?></a></span></small>
                    <small class="float-right">Telepon/HP : <?= $data->hp ?></small>
                </div>
            </div>
        </div>
    <?php  }
    ?>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $title ?></h5>
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
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>HP</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 1;
                            foreach ($ahli_data as $ahli) {
                            ?>
                                <tr>
                                    <td width="80px"><?php echo $start++ ?></td>
                                    <td><?php echo $ahli->nama ?></td>
                                    <td><?php echo $ahli->hp ?></td>
                                    <td><?php echo $ahli->umur ?></td>
                                    <td><?php echo $ahli->alamat ?></td>
                                    <td>
                                        <?php echo anchor("dashboard_pemandu/read/{$ahli->id}", "<i class='feather icon-eye'></i>Detail", ['class' => 'btn btn-sm btn-gradient-info']) ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>HP</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>