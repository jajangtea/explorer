<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tour Guide</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
	<meta name="author" content="Codedthemes" />
	<?php $this->load->view('template_frontend/css') ?>
</head>

<body>
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<nav class="pcoded-navbar theme-horizontal menu-light icon-colored">
		<div class="navbar-wrapper">
			<div class="navbar-brand header-logo">
				<a href="index.html" class="b-brand">
					<div class="b-bg">
						<i class="feather icon-trending-up"></i>
					</div>
					<span class="b-title">Datta Able</span>
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content sidenav-horizontal" id="layout-sidenav">
				<ul class="nav pcoded-inner-navbar sidenav-inner">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li data-username="dashboard" class="nav-item pcoded-hasmenu">
						<a href="<?=base_url('dashboard/landing')?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Tempat Wisata</span></a>
						<ul class="pcoded-submenu">
							<li><a href="<?= base_url('dashboard/berbayar/1') ?>">Berbayar</a></li>
							<li><a href="<?= base_url('dashboard/berbayar/2') ?>">Landscape (Gratis)</a></li>
							<li><a href="<?= base_url('dashboard') ?>">Semua</a></li>
						</ul>
					</li>
					<li data-username="widget Statistic Data Table User card Chart" class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Pemandu Wisata</span><span class="pcoded-badge label label-info">100+</span></a>
						<ul class="pcoded-submenu">
							<li><a href="<?= base_url('dashboard_pemandu') ?>">Profesional</a></li>
							<li><a href="<?= base_url('dashboard_agent') ?>">Travel Agent</a></li>
						</ul>
					</li>
					<li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Photographer</span></a>
						<ul class="pcoded-submenu">
							<li><a href="<?= base_url('dashboard_photographer') ?>">Profesional</a></li>
							<li><a href="<?= base_url('dashboard_studio') ?>">Studio Photo</a></li>
						</ul>
					</li>
					<li data-username="advance components Alert gridstack lightbox modal notification pnotify rating rangeslider slider syntax highlighter Tour Tree view Nestable Toolbar" class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-gitlab"></i></span><span class="pcoded-mtext">Informasi</span></a>

					</li>
					<li data-username="extra components Session Timeout Session Idle Timeout Offline" class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Tentang Kami</span></a>
					</li>

					<li class="nav-item pcoded-menu-caption">
						<label>Chart & Maps</label>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php $this->load->view('template_frontend/header') ?>
	<section class="header-chat">
		<div class="h-list-header">
			<h6>Josephin Doe</h6>
			<a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
		</div>
		<div class="h-list-body">
			<div class="main-chat-cont scroll-div">
				<div class="main-friend-chat">
					<div class="media chat-messages">
						<a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url() ?>assets/backend/template/assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
						<div class="media-body chat-menu-content">
							<div class="">
								<p class="chat-cont">hello Datta! Will you tell me something</p>
								<p class="chat-cont">about yourself?</p>
							</div>
							<p class="chat-time">8:20 a.m.</p>
						</div>
					</div>
					<div class="media chat-messages">
						<div class="media-body chat-menu-reply">
							<div class="">
								<p class="chat-cont">Ohh! very nice</p>
							</div>
							<p class="chat-time">8:22 a.m.</p>
						</div>
					</div>
					<div class="media chat-messages">
						<a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url() ?>assets/backend/template/assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
						<div class="media-body chat-menu-content">
							<div class="">
								<p class="chat-cont">can you help me?</p>
							</div>
							<p class="chat-time">8:20 a.m.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="h-list-footer">
			<form action="#">
				<div class="input-group">
					<input type="file" class="chat-attach" style="display:none">
					<a href="#!" class="input-group-prepend btn btn-success btn-attach">
						<i class="feather icon-paperclip"></i>
					</a>
					<input type="text" name="h-chat-text" class="form-control h-send-chat" placeholder="Write hear . . ">
					<button type="submit" class="btn btn-primary">
						<i class="feather icon-message-circle"></i>
					</button>
				</div>
			</form>
		</div>
	</section>

	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">

							<?php echo $contents ?>
							<!-- end content -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('template_frontend/js') ?>
</body>


