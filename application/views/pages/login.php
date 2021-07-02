<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">	
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?= $this->assets_sista('/vendor/animate/animate.css"') ?>>	
<link rel="stylesheet" type="text/css" href="<?= $this->assets_sista('/vendor/css-hamburgers/hamburgers.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= $this->assets_sista('/vendor/select2/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= $this->assets_sista('/css/util.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= $this->assets_sista('/css/main.css') ?>">
<link rel="stylesheet" href="<?= $this->assets_sista('/css/login.css') ?>">
<link rel="stylesheet" href="<?= $this->assets_sista('/css/style.css') ?>">

<div class="bg-primary">
	<div class="container-login100" style="background: none">
		<div class="wrap-login100 py-5 align-items-center">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="<?= $this->assets_sista('img/image_home.png') ?>" alt="img">
			</div>
			<form method="post" class="login100-form validate-form" action="<?= base_url('home/login') ?>">
				<span class="login100-form-title">
					Login
				</span>
				<?= $this->session->flashdata('error') ?>
				<div class="form-group">
					<input type="text" class="form-control rounded-pill p-4" placeholder="Masukan Email" name="email">
					<?= form_error('email', '<small class="text-danger">*', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control rounded-pill p-4" placeholder="Masukan Password" name="password">
					<?= form_error('password', '<small class="text-danger">*', '</small>') ?>
				</div>
				<div class="container-login100-form-btn mt-0 pt-0">
					<input class="login100-form-btn" type="submit" value="Login" >
					<span class="mt-3">Belum punya akun? <a href="<?= base_url('daftar') ?>" class="text-primary">Daftar</a></span>
				</div>
			</form>
		</div>
	</div>
</div>
