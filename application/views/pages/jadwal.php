<section class="pt-5">
<div class="container">
  <header>
    <h1 class="text-bold">Jadwal Seminar</h1>
  </header>
  <div class="wrapper bg-white mt-3">
    <div class="wrapper__outer">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-primary text-white">
                  <tr>
                      <th>NO</th>
                      <th>NIM</th>
                      <th>Mahasiswa/i</th>
                      <th>Seminar</th>
                      <th>Waktu</th>
                      <th>Ruangan</th>
                  </tr>
              </thead>
              <tbody>
								<?php foreach($content['jadwal'] as $key => $jadwal): ?>
                  <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $jadwal->nim ?></td>
                      <td><a href="<?= base_url("jadwal/detail/{$jadwal->seminar_id}") ?>"><?= $jadwal->nama_mahasiswa ?></a></td>
                      <td><?= $jadwal->judul ?></td>
                      <td><?= "{$jadwal->tanggal}, Pukul {$jadwal->jam}" ?></td>
                      <td><?= $jadwal->lokasi ?? '-' ?></td>
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
