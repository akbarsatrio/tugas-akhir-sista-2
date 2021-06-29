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
			<form method="post" class="login100-form validate-form">
				<span class="login100-form-title">
					Login
				</span>
				<div class="wrap-input100 validate-input" data-validate = "Valid Username is required">
					<input class="input100" type="text" name="username" placeholder="Masukan Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="password" placeholder="Masukan Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" name="submit" value="Login" >
					<span class="mt-3">Belum punya akun? <a href="<?= base_url('daftar') ?>" class="text-primary">Daftar</a></span>
				</div>
			</form>
		</div>
	</div>
</div>
