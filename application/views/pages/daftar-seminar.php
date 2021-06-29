<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Pendaftaran Seminar TA Baru</h1>
      <p>Pendaftaran Seminar berlaku untuk mahasiswa yang telah mendapat persetujuan dari Pembimbing TA</p>
    </header>
    <form class="pt-3">
      <div class="wrapper bg-white">
        <div class="wrapper__outer">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nim">NIM :</label>
              <input type="number" class="form-control form_mod" autocomplete="off" placeholder="Masukan NIM Anda" id="nim">
            </div>
            <div class="form-group col-md-6">
              <label for="tanggal">Tanggal Seminar :</label>
              <input type="date" id="tanggal" class="form-control form_mod" autocomplete="off">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nama">Nama :</label>
              <input type="text" id="nama" class="form-control form_mod" autocomplete="off" placeholder="Masukan Nama">
            </div>
            <div class="form-group col-md-6">
              <label for="jam">Jam Seminar :</label>
              <input type="time" id="jam" class="form-control form_mod" autocomplete="off">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prodi">Prodi :</label>
              <select id="prodi" class="custom-select form_mod">
                <option value="1">Informatika</option>
                <option value="2">Sistem Informasi</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="seminar">Seminar :</label>
              <select id="seminar" class="custom-select form_mod">
                <option value="1">Proposal</option>
                <option value="2">Seminar Hasil</option>
                <option value="3">Sidang Akhir</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="judul">Judul TA :</label>
                <textarea id="judul" rows="5" class="form-control form_mod"></textarea>
              </div>
              <div class="form-gruop">
                <label for="ruangan">Ruangan :</label>
                <input type="text" id="ruangan" class="form-control form_mod" autocomplete="off" placeholder="Masukan ruangan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pembimbing">Pembimbing :</label>
                <select id="pembimbing" class="custom-select form_mod">
                  <option value="1">Sirojul Munir S.Si, M.Kom</option>
                  <option value="2">...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="penguji1">Penguji 1 :</label>
                <select id="penguji1" class="custom-select form_mod">
                  <option value="1">Ahmad Rio M.Si</option>
                  <option value="2">...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="penguji2">Penguji 2 :</label>
                <select id="penguji2" class="custom-select form_mod">
                  <option value="1">Amalia Rahmah M.T</option>
                  <option value="2">...</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  <button onclick="validate()" type="submit" class="btn btn-dark btn_black btn_mod mt-4">Daftar</button>
  </div>
</section>
