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
					<li class="sidebar-item <?= ($this->uri->segment(2) == $mn->menu_link) ? 'active' : '' ?> has-sub">
						<a href="#" class='sidebar-link'>
									<i class="bi <?= $mn->menu_icon; ?>"></i>
									<span><?= $mn->menu_name; ?></span>
							</a>
							<ul class="submenu <?= ($this->uri->segment(2) == $mn->menu_link) ? 'active' : '' ?>">
								<?php foreach ($mn->submenu as $sm): ?>
									<li class="submenu-item <?= ($this->uri->segment(4) == $sm->menu_link) ? 'active' : '' ?>">
											<a href="<?= base_url("admin/{$mn->menu_link}/sub/{$sm->menu_link}") ?>"><?=  $sm->menu_name; ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
					</li>
				<?php } else { ?>
					<a class="nav-link <?= ($this->uri->segment(1) == $mn->menu_link) ? 'active' : '' ?>" href="<?= base_url("{$mn->menu_link}") ?>"><?= $mn->menu_name; ?></a>
				<?php }; ?>
			<?php endforeach; ?>
			<a class="nav-link btn btn-primary px-3 text-white" style="border-radius: 100px;" href="<?= base_url('login') ?>">Login <i class="far fa-fw fa-sign-in"></i></a>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
