<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand text-bold" href="#">SISTA</a>
  </div>
</nav>
<!-- End Navbar -->
<div class="sidebar bg-white shadow" style="width: 18%; height: 100vh; position: fixed; z-index: 1;">
<?php foreach ($menu as $mn): ?>
	<?php if(count($mn->submenu)) { ?>
		<div class="dropdown">
			<a class="nav-link <?= ($this->uri->segment(1) == $mn->menu_link) ? 'active' : '' ?>" href="#" id="<?= $mn->menu_link ?>" data-toggle="dropdown" aria-expanded="false">
				<span><?= $mn->menu_name; ?> <i class="fas fa-fw fa-chevron-down" style="transform: scale(.75);"></i></span>
			</a>
			<div class="dropdown-menu" aria-labelledby="<?= $mn->menu_link ?>">
			<?php foreach ($mn->submenu as $sm): ?>
				<a class="dropdown-item <?= ($this->uri->segment(2) == $sm->menu_link) ? 'active' : '' ?>" href="<?= base_url("{$mn->menu_link}/{$sm->menu_link}") ?>"><?=  $sm->menu_name; ?></a>
			<?php endforeach; ?>
			</div>
		</div>
	<?php } else { ?>
		<a class="btn btn-light bg-white py-4 shadow-none btn-block rounded-0 m-0 btn_mod text-left btn-sidebar <?= ($this->uri->segment(1) == $mn->menu_link) ? 'active' : '' ?>" href="<?= base_url("{$mn->menu_link}") ?>"><div class="bg-primary rounded d-inline p-2 mr-2 text-white"><i class="far fa-fw fa-<?= $mn->menu_icon; ?>"></i></div><?= $mn->menu_name; ?></a>
	<?php }; ?>
<?php endforeach; ?>
	<a class="btn btn-light mt-auto bg-white text-danger py-4 shadow-none btn-block rounded-0 m-0 btn_mod text-left btn-sidebar" href="<?= $this->session->userdata('is_login') == TRUE ? base_url('logout') : base_url('login') ?>"><div class="bg-danger rounded d-inline p-2 mr-2 text-white"><?= $this->session->userdata('is_login') == TRUE ? '<i class="far fa-fw fa-sign-out"></i></div> Logout' : '<i class="far fa-fw fa-sign-in"></i></div> Login' ?></a>
</div>

<style>
	.btn-sidebar.active {
		background: #f7fafc !important;
	}
</style>
