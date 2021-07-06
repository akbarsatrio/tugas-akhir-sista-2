<section class="pt-5">
  <div class="container">
    <header>
			<?= $this->session->flashdata('success') ?>
      <h1 class="text-bold">Profil saya</h1>
    </header>
    <form class="pt-3" method="post" enctype="multipart/form-data" action="<?= base_url('profil') ?>">
      <div class="wrapper bg-white">
        <div class="wrapper__outer">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= $content['profile']->user_image != NULL ? $this->assets_sista("img/uploads/profil/{$content['profile']->user_image}") : 'https://user-images.githubusercontent.com/16608864/35882949-bbe13aa0-0bab-11e8-859c-ceda3b213818.jpeg' ?>" alt="profile" class="img-fluid img_mod">
              <div class="form-group mt-3">
                <input type="file" class="form-control form_mod" name="image">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="text" class="form-control form_mod <?= form_error('nim') != '' ? 'is-invalid' : '' ?>" autocomplete="off" placeholder="Masukan NIM Anda" id="nim" value="<?= set_value('nim') != '' ? set_value('nim') : ($this->session->userdata('user_nim') != $content['profile']->user_nim ? $content['profile']->user_nim : $this->session->userdata('user_nim')) ?>" name="nim">
								<div class="invalid-feedback">
									<?= form_error('nim') ?>
								</div>
              </div>
              <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control form_mod <?= form_error('nama') != '' ? 'is-invalid' : '' ?>" autocomplete="off" placeholder="Masukan Nama Anda" id="nama" value="<?= set_value('nama') != '' ? set_value('nama') : ($this->session->userdata('user_nama') != $content['profile']->user_name ? $content['profile']->user_name : $this->session->userdata('user_nama')) ?>" name="nama">
								<div class="invalid-feedback">
									<?= form_error('nama') ?>
								</div>
              </div>
              <div class="form-group">
                <label for="prodi">Prodi :</label>
                <select id="prodi" class="custom-select form_mod <?= form_error('prodi') != '' ? 'is-invalid' : '' ?>" name="prodi">
                  <option value="ti" <?= $content['profile']->user_prodi == 'ti' ? 'selected' : '' ?>>Informatika</option>
                  <option value="si" <?= $content['profile']->user_prodi == 'si' ? 'selected' : '' ?>>Sistem Informasi</option>
                </select>
								<div class="invalid-feedback">
									<?= form_error('prodi') ?>
								</div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="angkatan">Angkatan :</label>
									<input type="number" class="form-control form_mod <?= form_error('angkatan') != '' ? 'is-invalid' : '' ?>" value="<?= $content['profile']->user_angkatan ?>" name="angkatan">
									<div class="invalid-feedback">
										<?= form_error('angkatan') ?>
									</div>
                </div>
                <div class="form-group col-md-9">
                  <label for="password">Password :</label>
                  <input type="password" class="form-control form_mod <?= form_error('password') != '' ? 'is-invalid' : '' ?>" autocomplete="off" placeholder="Password Anda" id="password" value="<?= $this->session->userdata('user_password') ?>" name="password">
									<div class="invalid-feedback">
										<?= form_error('password') ?>
									</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
			<button type="submit" class="btn btn-dark btn_black btn_mod mt-4">Update</button>
    </form>
  </div>
</section>
