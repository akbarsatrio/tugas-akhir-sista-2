<section class="pt-5">
  <div class="container">
    <header class="row mb-3 align-items-center">
      <div class="col-lg-6 item_left">
        <h1 class="text-bold"><?= $content['jadwal']->kategori_nama ?></h1>
        <p>Dari <?= $content['jadwal']->nama_mahasiswa ?></p>
      </div>
      <div class="col-lg-6 item_right">
        <div class="float-lg-right">
          <a href="#" style="color: blue;">Home</a> >
          <a href="#" style="color: blue;">Jadwal</a> >
          Seminar Proposal
        </div>
      </div>
    </header>
    <div class="bg-white wrapper">
      <div class="wrapper__outer">
        <div class="box">
          <div class="row">
            <div class="col-md-4 mb-3">
              <p class="m-0">NIM :</p>
              <p class="text-bold"><?= $content['jadwal']->nim ?></p>
              <p class="m-0">Nama :</p>
              <p class="text-bold"><?= $content['jadwal']->nama_mahasiswa ?></p>
              <p class="m-0">Prodi :</p>
              <p class="text-bold">Teknik Informatika</p>
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col mb-3">
                  <p class="m-0">Judul :</p>
                  <p class="text-bold"><?= $content['jadwal']->judul ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="m-0">Waktu :</p>
                  <p class="text-bold"><?= "{$content['jadwal']->jam} {$content['jadwal']->tanggal}" ?></p>
                  <p class="m-0">Ruang :</p>
                  <p class="text-bold">Zoom Online</p>
                </div>
                <div class="col-6">
                  <p class="m-0">Pembimbing :</p>
                  <p class="text-bold"><?= $content['jadwal']->dosen_nama ?></p>
                  <p class="m-0">Penguji :</p>
                  <p class="text-bold"><?= $content['jadwal']->penguji1_id ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="<?= base_url('jadwal/detail/{id}/daftar') ?>" class="btn btn-dark btn_black btn_mod mt-3">
      Daftar Peserta
    </a>
  </div>  
</section>
