<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Kelola Verifikasi Registrasi User</h1>
    </header>
		<?= $this->session->flashdata('msg') ?>
    <div class="bg-white wrapper mt-3">
      <div class="wrapper__outer">
				<div class="table-responsive"> 
					<table id="datatable" class="table table-striped table-bordered mt-3">
						<thead class="bg-primary text-white">
							<tr>
								<td>NO</td>
								<td width="200" align="center">NIM</td>
								<td width="800" align="center">Mahasiswa/i</td>
								<td width="200" align="center">Action</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content['akun'] as $key => $value): ?>
								<tr>
									<td align="center"><?= $key+1 ?></td>
									<td align="center"><?= $value->user_nim ?></td>
									<td align="center"><?= $value->user_name ?></td>
									<td class="text-center">
										<form action="<?= base_url('lainnya/verifikasi-akun') ?>" method="POST">
											<input type="hidden" value="<?= $value->id_user ?>" name="user_id">
											<button type="submit"  class="btn btn-primary" onclick="return confirm('Adna Yakin untuk konfirmasi akun dengan nama <?= $value->user_name ?>?')"><i class="far fa-fw fa-check mr-2"></i>Terima</button>
										</form>
									</td>
								</tr>
							<?php endforeach ?>
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
