<section class="pt-5">
  <div class="container">
		<header class="row">
      <div class="col-md-8">
				<h1 class="text-bold">Data Dosen</h1>
        <p>Tabel Data Dosen</p>
      </div>
      <div class="col-md-4">
			<a href="<?= base_url('data-dosen/post') ?>" class="float-md-right btn btn-primary btn_mod">Tambah Data</a>
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
								<th>NIDN</th>
								<th>Nama/i</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($content['dosen'] as $key => $dosen): ?>
								<tr>
										<td><?= $key+1 ?></td>
										<td><?= $dosen->nidn ?></td>
										<td><?= $dosen->nama ?></td>
										<td><a href="<?= base_url("data-dosen/dosen/{$dosen->dosen_id}") ?>"><?= $this->dosen_models->get_dosen(['dosen_id' => $dosen->dosen_id])->num_rows() ?> Dosen (view)</a></td>
										<td>
											<div class="d-flex">
												<a href="<?= base_url("data-dosen/put/{$dosen->dosen_id}") ?>" class="btn btn-warning mr-1"><i class="far fa-fw fa-edit"></i></a>
												<form action="<?= base_url('data-dosen/delete') ?>" method="POST">
													<input type="hidden" value="<?= $dosen->dosen_id ?>" name="dosen_id">
													<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin hapus?')"><i class="far fa-fw fa-trash"></i></button>
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

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable();
		console.log($('#datatable'));
  } );
</script>
