<section class="pt-5">
  <div class="container">
    <header class="row mb-3 align-items-center">
      <div class="col-lg-6 item_left">
        <h1 class="text-bold"><?= $content['jadwal']->kategori_nama ?></h1>
        <p><?= $content['jadwal']->nama_mahasiswa ?></p>
      </div>
      <div class="col-lg-6 item_right">
        <div class="float-lg-right">
				<?= $content['jadwal']->kategori_nama ?>
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
              <p class="m-0">Ruang :</p>
              <p class="text-bold"><?= $content['jadwal']->lokasi ?></p>
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
                  <p class="text-bold"><?= "{$content['jadwal']->tanggal}, Pukul {$content['jadwal']->jam}" ?></p>
									<p class="m-0">Pembimbing :</p>
                  <p class="text-bold"><?= $content['jadwal']->dosen_nama ?></p>
                </div>
                <div class="col-6">
                  <p class="m-0">Penguji 1 :</p>
                  <p class="text-bold"><?= $content['jadwal']->dosen1_nama ?></p>
									<p class="m-0">Penguji 2 :</p>
                  <p class="text-bold"><?= $content['jadwal']->dosen2_nama ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h2 class="text-bold mt-3 mb-4">Daftar Peserta Seminar</h2>
				<?= $this->session->flashdata('msg') ?>
        <table id="datatable" class="table table-striped table-bordered ">
          <thead class="bg-primary text-white">
            <tr>
              <td>NO</td>
              <td width="200">NIM</td>
              <td width="800">Mahasiswa/i</td>
							<td width="100">Kehadiran</td>
              <td width="100">Action</td>
            </tr>
          </thead>
          <tbody>
						<?php foreach($content['peserta'] as $key => $peserta): ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td><?= $peserta->nim ?></td>
              <td><?= $peserta->nama ?></td>
							<td><?= $peserta->kehadiran == '0' ? 'Tidak hadir' : 'Hadir' ?></td>
              <td>
								<form action="<?= base_url("daftar-seminar/peserta/{$content['jadwal']->seminar_id}/delete") ?>" method="POST">
									<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#<?= $peserta->id ?>"><i class="far fa-fw fa-pencil"></i></a>
									<input type="hidden" value="<?= $peserta->id ?>" name="peserta-id">
                	<button type="submit" class="btn btn-danger"><i class="far fa-fw fa-trash" onclick="return confirm('Yakin mau hapus <?= $peserta->nama ?> dari daftar peserta seminar?')"></i></button>
								</form>
							</td>
            </tr>

						<!-- Modal -->
						<div class="modal fade" id="<?= $peserta->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="<?= $peserta->id ?>Label" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="<?= $peserta->id ?>Label">Ubah data</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= base_url("daftar-seminar/peserta/{$content['jadwal']->seminar_id}/put") ?>" method="POST">
										<input type="hidden" value="<?= $peserta->id ?>" name="peserta-id">
											<div class="form-group">
												<label for="">NIM : </label>
												<input type="text" value="<?= $peserta->nim ?>" readonly class="form-control form_mod">
											</div>
											<div class="form-group">
												<label for="">Nama Mahasiswa/i : </label>
												<input type="text" value="<?= $peserta->nama ?>" readonly class="form-control form_mod">
											</div>
											<div class="form-group">
												<label for="">Status: </label>
												<select name="peserta-status" class="custom-select form_mod bg-white">
													<option value="1">Hadir</option>
													<option value="0">Tidak hadir</option>
												</select>
											</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary btn_mod">Simpan</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>  
</section>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable();
		console.log($('#datatable'));
  } );
</script>
