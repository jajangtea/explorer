<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"></h5>
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
                <?php echo form_open_multipart($action) ?>
                <div class="form-group col-lg-6">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
                <div class="form-group col-lg-3">
                    <label for="int">Umur <?php echo form_error('umur') ?></label>
                    <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?php echo $umur; ?>" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="varchar">Hp <?php echo form_error('hp') ?></label>
                    <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
                </div>
                <div class="form-group col-lg-12">
                    <label for="varchar">Upload Foto <?php echo form_error('profil') ?></label>
                    <input type="file" class="dropify" name="profil" />
                    <input type="hidden" name="old_image" <?php echo $profil; ?> />
                </div>
                <div class="form-group col-lg-12">
                    <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="keterangan">Deskripsi <?php echo form_error('keterangan') ?></label>
                    <textarea class="ckeditor" rows="3" name="keterangan" id="ckeditor" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="id_jenis_keahlian" value="<?php echo $id_jenis_keahlian; ?>" />
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('ahli') ?>" class="btn btn-danger">Cancel</a>
                </div>
                <?php
                form_close();
                ?>
                <div class="form-row">
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