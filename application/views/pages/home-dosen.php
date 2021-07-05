<section class="pt-5">
  <div class="container">
    <header>
      <h1 class="text-bold">Dashboard Dosen</h1>
			<hr width="50" align="left" class="bg-primary" style="height: 4px;">
			<?= $this->session->flashdata('success') ?>
    </header>
    <div class="bg-white wrapper mt-3">
      <div class="wrapper__outer">
				<div id="menu-shortcut">
					<div class="row ml-0 mb-3">
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
					</div>
				</div>
				<hr>
				<div id="statistik">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-bold">Pengunjung</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart"></div>
						</div>
						<div class="col-md-6">
							<h5 class="text-bold">Akun</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart2"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h5 class="text-bold">Kategori Seminar</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart3"></div>
						</div>
						<div class="col-md-4">
							<h5 class="text-bold">Dominasi Pendaftaran</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart4"></div>
						</div>
						<div class="col-md-4">
							<h5 class="text-bold">Kehadiran</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart5"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?= $this->assets_sista('vendor/apexchart/apexcharts.min.js') ?>"></script>
<script>
	var options = {
		chart: {
			type: 'line'
		},
		series: [{
			name: 'Registrasi',
			data: [30,40,35,50,49,60,70,91,125]
		}],
		xaxis: {
			categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
		}
	}

	var kategori_seminar = {
		chart: {
			type: 'donut'
		},
		series: [44, 55, 41, 17, 15],
		chartOptions: {
			labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
		}
	}

	var chart = new ApexCharts(document.querySelector("#chart"), options);
	var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
	var chart3 = new ApexCharts(document.querySelector("#chart3"), kategori_seminar);
	var chart4 = new ApexCharts(document.querySelector("#chart4"), kategori_seminar);
	var chart5 = new ApexCharts(document.querySelector("#chart5"), kategori_seminar);

	chart.render();
	chart2.render();
	chart3.render();
	chart4.render();
	chart5.render();
</script>
