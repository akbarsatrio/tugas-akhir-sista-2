<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Register</h1>
    </header>
    <div class="bg-white wrapper mt-3">
      <div class="wrapper__outer">
      <form method="post" id="register" action="<?= base_url('daftar') ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nama :</label>
            <input type="text" class="form-control form_mod <?= form_error('nama') != '' ? 'is-invalid' : '' ?>" placeholder="Masukan Nama" name="nama" value="<?= set_value('nama') ?>">
						<div class="invalid-feedback">
							<?= form_error('nama') ?>
						</div>
          </div>
          <div class="form-group col-md-6">
            <label>NIM :</label>
            <input type="text" class="form-control form_mod <?= form_error('nim') != '' ? 'is-invalid' : '' ?>" placeholder="Masukan NIM" name="nim" value="<?= set_value('nim') ?>">
						<div class="invalid-feedback">
							<?= form_error('nim') ?>
						</div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Email :</label>
            <input type="email" class="form-control form_mod <?= form_error('email') != '' ? 'is-invalid' : '' ?>" placeholder="Masukan Email Kampus" name="email" value="<?= set_value('email') ?>">
						<div class="invalid-feedback">
							<?= form_error('email') ?>
						</div>
          </div>
          <div class="form-group col-md-4">
            <label>Password :</label>
            <input type="password" class="form-control form_mod <?= form_error('password') != '' ? 'is-invalid' : '' ?>" placeholder="Masukan Password" name="password" value="<?= set_value('password') ?>">
						<div class="invalid-feedback">
							<?= form_error('password') ?>
						</div>
          </div>
					<div class="form-group col-md-4">
            <label>Konfirmasi Password :</label>
            <input type="password" class="form-control form_mod <?= form_error('password-confirm') != '' ? 'is-invalid' : '' ?>" placeholder="Masukan Ulang Password" name="password-confirm" value="<?= set_value('password-confirm') ?>">
						<div class="invalid-feedback">
							<?= form_error('password-confirm') ?>
						</div>
          </div>
          <div class="form-group col-md-6">
            <label>Prodi :</label> 
            <select name="prodi" class="custom-select form-control form_mod <?= form_error('prodi') != '' ? 'is-invalid' : '' ?>">
              <option value="ti" <?= set_value('prodi') == 'ti' ? 'selected' : '' ?>>Teknik Informatika</option>
              <option value="si" <?= set_value('prodi') == 'si' ? 'selected' : '' ?>>Sistem Informasi</option>
            </select>
						<div class="invalid-feedback">
							<?= form_error('prodi') ?>
						</div>
          </div>
          <div class="form-group col-md-6">
            <label>Angkatan :</label>
            <input type="num" class="form-control form_mod <?= form_error('angkatan') != '' ? 'is-invalid' : '' ?>" placeholder="Tahun Angkatan" name="angkatan" value="<?= set_value('angkatan') ?>">
						<div class="invalid-feedback">
							<?= form_error('angkatan') ?>
						</div>
          </div>
        </div>  
				<button type="submit" class="btn btn-primary btn_mod my-3">Sign Up</button>
      </form>
      <span class="d-block">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk</a></span>
    </div>
  </div>
</section> 
