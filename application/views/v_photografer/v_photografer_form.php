<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">V_photografer <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Tenaga Ahli <?php echo form_error('id_tenaga_ahli') ?></label>
            <input type="text" class="form-control" name="id_tenaga_ahli" id="id_tenaga_ahli" placeholder="Id Tenaga Ahli" value="<?php echo $id_tenaga_ahli; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Umur <?php echo form_error('umur') ?></label>
            <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?php echo $umur; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Profil <?php echo form_error('profil') ?></label>
            <input type="text" class="form-control" name="profil" id="profil" placeholder="Profil" value="<?php echo $profil; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tinytext">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Spesialisasi <?php echo form_error('nama_spesialisasi') ?></label>
            <input type="text" class="form-control" name="nama_spesialisasi" id="nama_spesialisasi" placeholder="Nama Spesialisasi" value="<?php echo $nama_spesialisasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
        </div>
	    <div class="form-group">
            <label for="spesialiasasi_keterangan">Spesialiasasi Keterangan <?php echo form_error('spesialiasasi_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="spesialiasasi_keterangan" id="spesialiasasi_keterangan" placeholder="Spesialiasasi Keterangan"><?php echo $spesialiasasi_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Job Status <?php echo form_error('job_status') ?></label>
            <input type="text" class="form-control" name="job_status" id="job_status" placeholder="Job Status" value="<?php echo $job_status; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('v_photografer') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>