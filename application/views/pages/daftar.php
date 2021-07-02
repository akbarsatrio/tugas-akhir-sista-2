<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Register</h1>
    </header>
    <div class="bg-white wrapper mt-3">
      <div class="wrapper__outer">
      <form method="post" id="register" onsubmit="return cekRegister()">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nama :</label>
            <input type="text" class="form-control form_mod" placeholder="Masukan Nama" name="nama">
          </div>
          <div class="form-group col-md-6">
            <label>NIM :</label>
            <input type="number" class="form-control form_mod" placeholder="Masukan NIM" name="nim">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Usarname :</label>
            <input type="text" class="form-control form_mod" placeholder="Masukan Username" name="username">
          </div>
          <div class="form-group col-md-6">
            <label>Password :</label>
            <input type="password" class="form-control form_mod" placeholder="Masukan Password" name="password">
          </div>
          <div class="form-group col-md-6">
            <label>Prodi :</label> 
            <select name="Prodi" class="custom-select form-control form_mod">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Angkatan :</label>
            <select name="Angkatan" class="custom-select form-control form_mod">
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018 </option>
            </select>
          </div>
        </div>  
				<button class="btn btn-primary btn_mod my-3">Sign Up</button>
      </form>
      <span class="d-block">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk</a></span>
    </div>
  </div>
</section> 
