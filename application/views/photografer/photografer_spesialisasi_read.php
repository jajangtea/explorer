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
        <h2 style="margin-top:0px">Photograher_spesialisasi Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Id Tenaga Ahli</td><td><?php echo $id_tenaga_ahli; ?></td></tr>
	    <tr><td>Id Spesialisasi</td><td><?php echo $id_spesialisasi; ?></td></tr>
	    <tr><td>Job Status</td><td><?php echo $job_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('photograher') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>