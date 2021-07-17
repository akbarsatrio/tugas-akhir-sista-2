<section class="pt-5">
  <div class="container">
		<header class="row">
      <div class="col-md-8">
				<h1 class="text-bold">Daftar Penilaian Seminar TA</h1>
      </div>
      <div class="col-md-4">
			<a href="#" class="float-md-right btn btn-primary btn_mod" data-toggle="modal" data-target="#add-data">Tambah Data</a>
      </div>
    </header>
		<?= $this->session->flashdata('msg') ?>
    <div class="wrapper bg-white mt-3">
      <div class="wrapper__outer">
        <div class="table-responsive"> 
          <table id="datatable" class="table table-striped table-bordered">
						<thead class="bg-primary text-white">
							<tr>
								<th>NO</th>
								<th>Dosen</th>
								<th>Sektor Penilaian</th>
								<th>Seminar</th>
								<th>Nilai yang diberikan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($content['penilaian'] as $key => $penilaian): ?>
								<tr>
										<td><?= $key+1 ?></td>
										<td><?= $penilaian->dosen_nama ?></td>
										<td><?= $penilaian->penilaian_nama ?></td>
										<td><?= $penilaian->judul ?></td>
										<td><?= $penilaian->nilai ?></td>
										<td>
											<div class="d-flex">
												<form action="<?= base_url('lainnya/detail-penilaian/delete') ?>" method="POST">
													<input type="hidden" value="<?= $penilaian->detail_penilaian_id ?>" name="detail_penilaian_id">
													<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus?')"><i class="far fa-fw fa-trash"></i></button>
												</form>
											</div>
										</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="add-data" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add-dataLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add-dataLabel">Tambah data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('lainnya/detail_penilaian') ?>" method="POST">
				<input type="hidden" value="add-data" name="peserta-id">
					<div class="form-group">
						<label for="">Dosen: </label>
						<select name="dosen_id" class="custom-select form_mod bg-white">
							<?php foreach ($content['dosen'] as $key => $dosen): ?>
								<option value="<?= $dosen->id ?>"><?= $dosen->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Sektor Penilaian: </label>
						<select name="penilaian_id" class="custom-select form_mod bg-white">
							<?php foreach ($content['penilaian2'] as $key => $penilaian2): ?>
								<option value="<?= $penilaian2->id ?>"><?= $penilaian2->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Seminar: </label>
						<select name="seminar_id" class="custom-select form_mod bg-white">
							<?php foreach ($content['seminar'] as $key => $seminar): ?>
								<option value="<?= $seminar->id ?>"><?= "{$seminar->judul} Oleh {$seminar->nama_mahasiswa}" ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nilai yang diberikan: </label>
						<input type="text" class="form-control form_mod bg-white" name="nilai">
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn_mod">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable();
  } );
</script>
