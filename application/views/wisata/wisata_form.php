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
                <?php echo form_open_multipart($action) ?>
                <div class="form-group col-lg-12">
                    <label for="varchar">Nama Tempat <?php echo form_error('nama_tempat') ?></label>
                    <input type="text" class="form-control" name="nama_tempat" id="nama_tempat" placeholder="Nama Tempat" value="<?php echo $nama_tempat; ?>" />
                </div>
                <div class="form-group col-lg-12">
                    <label for="varchar">Upload Gambar <?php echo form_error('images') ?></label>
                    <input type="file" class="dropify" name="images" />
                    <input type="hidden" name="old_image" <?php echo $images; ?> />
                </div>
                <div class="form-group col-lg-12">
                    <label for="int">Kota <?php echo form_error('id_kota') ?></label>
                    <?php echo cmb_dinamis('id_kota', 'kota', 'nama_kota', 'id', $id_kota) ?>
                </div>
                <div class="form-group col-lg-12">
                    <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="int">Jenis Wisata <?php echo form_error('id_jenis_wisata') ?></label>
                    <?php echo cmb_dinamis('id_jenis_wisata', 'jenis_wisata', 'nama_jenis_wisata', 'id', $id_jenis_wisata) ?>
                </div>
                <div class="form-group col-lg-12">
                    <label for="keterangan">Deskripsi <?php echo form_error('keterangan') ?></label>
                    <textarea class="ckeditor" rows="3" name="keterangan" id="ckeditor" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                </div>
                <div class="form-group col-lg-12">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('wisata') ?>" class="btn btn-default">Cancel</a>
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