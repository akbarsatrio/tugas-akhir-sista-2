<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand text-bold" href="#">SISTA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-link" href="<?= base_url() ?>">Home</a>
        <a class="nav-link" href="<?= base_url('jadwal') ?>">Jadwal</a>
        <a class="nav-link" href="<?= base_url('daftar-seminar') ?>">Daftar Seminar</a>
        <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
        <a class="nav-link" href="<?= base_url('profil') ?>">Profil</a>
        <a class="nav-link" href="<?= base_url('tentang') ?>">Tentang</a>
        <a class="nav-link btn btn-primary px-3 text-white" style="border-radius: 100px;" href="login.html">Login <i class="far fa-fw fa-sign-in"></i></a>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
