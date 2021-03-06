<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Pendaftaran Seminar TA Baru</h1>
      <p>Pendaftaran Seminar berlaku untuk mahasiswa yang telah mendapat persetujuan dari Pembimbing TA</p>
    </header>
    <form class="pt-3" method="POST" action="<?= base_url('daftar-seminar/post') ?>">
      <div class="wrapper bg-white">
        <div class="wrapper__outer">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nim">NIM :</label>
              <input value="<?= set_value('nim') ?>" type="number" class="form-control form_mod <?= form_error('nim') != '' ? 'is-invalid' : '' ?>" autocomplete="off" placeholder="Masukan NIM" id="nim" name="nim">
							<div class="invalid-feedback">
								<?= form_error('nim') ?>
							</div>
            </div>
            <div class="form-group col-md-6">
              <label for="tanggal">Tanggal Seminar :</label>
              <input value="<?= set_value('tangsel') ?>" type="date" id="tanggal" class="form-control form_mod <?= form_error('tangsel') != '' ? 'is-invalid' : '' ?>" autocomplete="off" name="tangsel">
							<div class="invalid-feedback">
								<?= form_error('tangsel') ?>
							</div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nama">Nama :</label>
              <input value="<?= set_value('nama') ?>" type="text" id="nama" class="form-control form_mod <?= form_error('nama') != '' ? 'is-invalid' : '' ?>" autocomplete="off" placeholder="Masukan Nama" name="nama">
							<div class="invalid-feedback">
								<?= form_error('nama') ?>
							</div>
            </div>
            <div class="form-group col-md-6">
              <label for="jam">Jam Seminar :</label>
              <input value="<?= set_value('jamsem') ?>" type="time" id="jam" class="form-control form_mod <?= form_error('jamsem') != '' ? 'is-invalid' : '' ?>" autocomplete="off" name="jamsem">
							<div class="invalid-feedback">
								<?= form_error('jamsem') ?>
							</div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prodi">Prodi :</label>
              <select id="prodi" class="custom-select form_mod <?= form_error('prodi') != '' ? 'is-invalid' : '' ?>" name="prodi">
                <option value="1">Informatika</option>
                <option value="2">Sistem Informasi</option>
              </select>
							<div class="invalid-feedback">
								<?= form_error('prodi') ?>
							</div>
            </div>
            <div class="form-group col-md-6">
              <label for="seminar">Seminar :</label>
              <select id="seminar" class="custom-select form_mod <?= form_error('seminar') != '' ? 'is-invalid' : '' ?>" name="seminar">
								<?php foreach ($content['kategori'] as $key => $kategori): ?>
								<option value="<?= $kategori->id ?>"><?= $kategori->nama ?></option>
								<?php endforeach; ?>
              </select>
							<div class="invalid-feedback">
								<?= form_error('seminar') ?>
							</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Judul TA :</label>
                <textarea id="judul" rows="5" class="form-control form_mod <?= form_error('judul') != '' ? 'is-invalid' : '' ?>" name="judul"><?= set_value('judul') ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('judul') ?>
								</div>
              </div>
							<div class="form-group">
								<label for="jam">Lokasi Ruangan :</label>
								<input value="<?= set_value('lokasi') ?>" type="text" id="lokasi" class="form-control form_mod <?= form_error('lokasi') != '' ? 'is-invalid' : '' ?>" autocomplete="off" name="lokasi">
								<div class="invalid-feedback">
									<?= form_error('lokasi') ?>
								</div>
							</div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pembimbing">Pembimbing :</label>
                <select id="pembimbing" class="custom-select form_mod <?= form_error('pembimbing') != '' ? 'is-invalid' : '' ?>" name="pembimbing">
									<?php foreach ($content['dosen'] as $key => $dosen): ?>
                  <option value="<?= $dosen->id ?>"><?= $dosen->nama ?></option>
									<?php endforeach; ?>
                </select>
								<div class="invalid-feedback">
									<?= form_error('pembimbing') ?>
								</div>
              </div>
              <div class="form-group">
                <label for="penguji1">Penguji 1 :</label>
                <select id="penguji1" class="custom-select form_mod <?= form_error('penguji1') != '' ? 'is-invalid' : '' ?>" name="penguji1">
									<?php foreach ($content['dosen'] as $key => $dosen): ?>
                  <option value="<?= $dosen->id ?>"><?= $dosen->nama ?></option>
									<?php endforeach; ?>
                </select>
								<div class="invalid-feedback">
									<?= form_error('penguji1') ?>
								</div>
              </div>
              <div class="form-group">
                <label for="penguji2">Penguji 2 :</label>
                <select id="penguji2" class="custom-select form_mod <?= form_error('penguji2') != '' ? 'is-invalid' : '' ?>" name="penguji2">
									<?php foreach ($content['dosen'] as $key => $dosen): ?>
                  <option value="<?= $dosen->id ?>"><?= $dosen->nama ?></option>
									<?php endforeach; ?>
                </select>
								<div class="invalid-feedback">
									<?= form_error('penguji2') ?>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
			<button type="submit" class="btn btn-dark btn_black btn_mod mt-4">Daftar</button>
    </form>
  </div>
</section>
