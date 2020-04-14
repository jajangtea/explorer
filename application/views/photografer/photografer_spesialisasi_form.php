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


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $title ?></h5>
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
                <div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
                    <div class="div-to-align">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group col-lg-12">
                                <label for="int">Tenaga Ahli <?php echo form_error('id_tenaga_ahli') ?></label>
                                <?php echo cmb_dinamis('id_tenaga_ahli', 'tenaga_ahli', 'nama', 'id', $id_tenaga_ahli) ?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="int">Spesialisasi <?php echo form_error('id_spesialisasi') ?></label>
                                <?php echo cmb_dinamis('id_spesialisasi', 'spesialisasi', 'nama_spesialisasi', 'id', $id_spesialisasi) ?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="int">Job Status <?php echo form_error('job_status') ?></label>
                                <select id="job_status" class="form-control" name="job_status">
                                    <option value="0">Free</option>
                                    <option value="1">Full</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('spesialisasi') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>