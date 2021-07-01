<section class="pt-5">
  <div class="container">
    <header>
			<?= $this->session->flashdata('success') ?>
      <h1 class="text-bold">Profil saya</h1>
    </header>
    <form class="pt-3">
      <div class="wrapper bg-white">
        <div class="wrapper__outer">
          <div class="row">
            <div class="col-md-4">
              <img src="https://user-images.githubusercontent.com/16608864/35882949-bbe13aa0-0bab-11e8-859c-ceda3b213818.jpeg" alt="profile" class="img-fluid img_mod">
              <div class="form-group mt-3">
                <input type="file" class="form-control form_mod">
              </div>
            </div>
            <div class="col-md-8">
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
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="angkatan">Angkatan :</label>
                  <select id="angkatan" class="custom-select form_mod">
                    <option value="1">2020</option>
                    <option value="2">2019</option>
                    <option value="3">2018</option>
                  </select>
                </div>
                <div class="form-group col-md-9">
                  <label for="password">Password :</label>
                  <input type="password" class="form-control form_mod" autocomplete="off" placeholder="Password Anda" id="password">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <button onclick="validate_profil()" type="submit" class="btn btn-dark btn_black btn_mod mt-4">Update</button>
  </div>
</section>
