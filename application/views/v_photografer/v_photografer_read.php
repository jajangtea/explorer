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
        <h2 style="margin-top:0px">V_photografer Read</h2>
        <table class="table">
	    <tr><td>Id Tenaga Ahli</td><td><?php echo $id_tenaga_ahli; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Umur</td><td><?php echo $umur; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Profil</td><td><?php echo $profil; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Nama Spesialisasi</td><td><?php echo $nama_spesialisasi; ?></td></tr>
	    <tr><td>Biaya</td><td><?php echo $biaya; ?></td></tr>
	    <tr><td>Spesialiasasi Keterangan</td><td><?php echo $spesialiasasi_keterangan; ?></td></tr>
	    <tr><td>Job Status</td><td><?php echo $job_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('v_photografer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>