<section class="pt-5">
  <div class="container">
    <header class="row align-items-center">
      <div class="col-md-4">
        <h1 class="text-bold">Daftar Peserta</h1>
        <p>Dari <?= $content['jadwal']->nama_mahasiswa ?></p>
      </div>
      <div class="col-md-8">
        <div class="float-md-right">
          <a href="#">Home</a> >
          <a href="#">Jadwal</a> >
          <a href="#"><?= $content['jadwal']->kategori_nama ?></a> > Daftar Peserta
        </div>
      </div>
    </header>
    <div class="row pt-3 flex-row-reverse">
      <div class="col-md-6 mb-3">
        <div class="wrapper bg-white">
          <div class="wrapper__outer">
            <p class="m-0">Mahasiswa/i Seminar : </p>
            <p class="text-bold"><?= $content['jadwal']->nama_mahasiswa ?></p>
            <p class="m-0">Judul : </p>
            <p class="text-bold"><?= $content['jadwal']->judul ?></p>
            <p class="m-0">Waktu : </p>
            <p class="text-bold m-0"><?= "{$content['jadwal']->tanggal}, Pukul {$content['jadwal']->jam} " ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="wrapper bg-white">
          <div class="wrapper__outer">
            <form action="<?= base_url("jadwal/detail/{$content['jadwal']->seminar_id}/daftar") ?>" method="POST">
              <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="number" class="form-control form_mod" autocomplete="off" placeholder="Masukan NIM Anda" id="nim" name="nim" value="<?= set_value('nim') != '' ?  set_value('nim') : $this->session->userdata('user_nim') ?>">
								<?= form_error('nim', '<small class="text-danger">*', '</small>') ?>
              </div>
              <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control form_mod" autocomplete="off" placeholder="Masukan Nama Anda" id="nama" name="nama" value="<?= set_value('nama') != '' ? set_value('nama') : $this->session->userdata('user_nama') ?>">
								<?= form_error('nama', '<small class="text-danger">*', '</small>') ?>
              </div>
							<button type="submit" class="btn btn-dark btn_black btn_mod mt-3">Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
