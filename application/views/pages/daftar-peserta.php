<section class="pt-5">
  <div class="container">
    <header class="row align-items-center">
      <div class="col-md-4">
        <h1 class="text-bold">Daftar Peserta</h1>
        <p>Dari Diego Armando</p>
      </div>
      <div class="col-md-8">
        <div class="float-md-right">
          <a href="#">Home</a> >
          <a href="#">Jadwal</a> >
          <a href="#">Seminar Proposal</a> > Daftar Peserta
        </div>
      </div>
    </header>
    <div class="row pt-3 flex-row-reverse">
      <div class="col-md-6 mb-3">
        <div class="wrapper bg-white">
          <div class="wrapper__outer">
            <p class="m-0">Mahasiswa/i Seminar : </p>
            <p class="text-bold">Diego Armando</p>
            <p class="m-0">Judul : </p>
            <p class="text-bold">Rancangan Bangun Aplikasi Seminar Tugas Akhir
              Berbasis Web Menggunakan MVC Framework.</p>
            <p class="m-0">Waktu : </p>
            <p class="text-bold m-0">Senin, 04 Januari 2021, 10:00</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="wrapper bg-white">
          <div class="wrapper__outer">
            <form>
              <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="number" class="form-control form_mod" autocomplete="off" placeholder="Masukan NIM Anda" id="nim">
              </div>
              <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control form_mod" autocomplete="off" placeholder="Masukan Nama Anda" id="nama">
              </div>
              <div class="form-group">
                <label for="prodi">Prodi :</label>
                <select id="prodi" class="custom-select form_mod">
                  <option value="1">Informatika</option>
                  <option value="2">Sistem Informasi</option>
                </select>
              </div>
              <label>Program :</label>
              <div class="form-row m-0">
                <div class="form-group mr-3">
                  <input type="radio" name="program" class="radio-custom" value="d3" id="d3" checked>
                  <label for="d3">D3</label>
                </div>
                <div class="form-group mr-3">
                  <input type="radio" name="program" class="radio-custom" value="s1_reguler" id="s1_reguler">
                  <label for="s1_reguler">S1 Reguler</label>
                </div>
                <div class="form-group mr-3">
                  <input type="radio" name="program" class="radio-custom" value="s1_fast_trackt" id="s1_fast_trackt">
                  <label for="s1_fast_trackt">S1 Fast Trackt</label>
                </div>
                <div class="form-group mr-3">
                  <input type="radio" name="program" class="radio-custom" value="s2" id="s2">
                  <label for="s2">S2</label>
                </div>
              </div>
            </form>
            <button type="submit" class="btn btn-dark btn_black btn_mod mt-3" onclick="valdiate_daftarPesertaSeminar()">Daftar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
