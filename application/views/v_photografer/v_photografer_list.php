<style>
    .div-wrapper {
        margin-top: 10px;
    }

    .div-to-align {
        width: 100%;
    }


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


<div class="card">
    <div class="card-header">
        <h5>PAKET PHOTOGRAFER </h5>
        <div class="card-header-right">
            <div class="float-right">
            </div>
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
        <div class="customer-scroll" style="height:auto;position:relative;">
            <div class="table-responsive">
                <table id="table-style-hover" class="table  table-hover m-b-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Spesialisasi</th>
                            <th>Biaya</th>
                            <th>Job Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tr><?php
                                foreach ($v_photografer_data as $v_photografer) {
                                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $v_photografer->nama_spesialisasi ?></td>
                                <td><?php echo $v_photografer->biaya ?></td>
                                <td><?php echo $v_photografer->job_status ?></td>

                            </tr>
                        <?php
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>