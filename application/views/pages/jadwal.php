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
                  <tr>
                      <td>1</td>
                      <td>0102002</td>
                      <td><a href="<?= base_url('jadwal/detail/{id}') ?>">Diego Armando</a></td>
                      <td>Proposal</td>
                      <td>10:00 4-01-2020</td>
                      <td>Online</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>0102001</td>
                      <td><a href="<?= base_url('jadwal/detail/{id}') ?>">Ahmad Budiman</a></td>
                      <td>Seminar Hasil</td>
                      <td>13:00 4-01-2020</td>
                      <td>Online</td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>0102040</td>
                      <td><a href="<?= base_url('jadwal/detail/{id}') ?>">Fredelina Putri</a></td>
                      <td>Sidang akhir</td>
                      <td>12:00 8-01-2020</td>
                      <td>B2-304</td>
                  </tr>
                  <tr>
                      <td>4</td>
                      <td>0102003</td>
                      <td><a href="<?= base_url('jadwal/detail/{id}') ?>">Rio Agi</a></td>
                      <td>Sidang Akhir</td>
                      <td>10:00 15-01-2020</td>
                      <td>B2-305</td>
                  </tr>
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
