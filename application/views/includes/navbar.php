<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand text-bold" href="#">SISTA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
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
					<a class="nav-link <?= ($this->uri->segment(1) == $mn->menu_link) ? 'active' : '' ?>" href="<?= base_url("{$mn->menu_link}") ?>"><?= $mn->menu_name; ?></a>
				<?php }; ?>
			<?php endforeach; ?>
			<a class="nav-link btn <?= $this->session->userdata('is_login') == TRUE ? 'btn-danger' : 'btn-primary' ?> px-3 text-white" style="border-radius: 100px;" href="<?= $this->session->userdata('is_login') == TRUE ? base_url('logout') : base_url('login') ?>"><?= $this->session->userdata('is_login') == TRUE ? 'Logout <i class="far fa-fw fa-sign-out">' : 'Login <i class="far fa-fw fa-sign-in">' ?> </i></a>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
