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
					<h5 class="text-bold">Ikhtisar</h5>
					<hr width="25" align="left" class="bg-dark" style="height: 1px;">
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
					<div class="col p-0">
						<h5 class="text-bold">Jumlah Pengunjung</h5>
						<hr width="25" align="left" class="bg-dark" style="height: 1px;">
						<div id="chart"></div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<h5 class="text-bold">Jumlah Akun yang Terdaftar</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart2"></div>
						</div>
						<div class="col-lg-6">
							<h5 class="text-bold">Kategori yang Disukai Peserta</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart6"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-6">
							<h5 class="text-bold">Dominasi Seminar Berdasarkan Kategori</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart3"></div>
						</div>
						<div class="col-xl-4 col-lg-6">
							<h5 class="text-bold">Jumlah Permohonan yang Belum diverifikasi Berdasarkan Kategori</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="chart4"></div>
						</div>
						<div class="col-xl-4 col-lg-6">
							<h5 class="text-bold">Kehadiran Berdasarkan Kategori</h5>
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
	var webVisitOpt = {
		chart: {
			height: 280,
			type: "area",
			animations: {
				enabled: true,
				easing: 'linear',
				dynamicAnimation: {
					speed: 1000
				}
			},
			zoom: false,
			toolbar: {
        show: false,
			}
		},
		fill: {
			type: "solid",
			opacity: .25
		},
		noData: {
			text: 'Loading...'
		},
		series: [],
		color: ['#007bff'],
		stroke: {
			curve: 'smooth',
		},
		dataLabels: {
			enabled: true
		},
		fill: {
			gradient: {
				enabled: true,
				opacityFrom: 0.55,
				opacityTo: 0
			}
		},
	};

	var webAkunOpt = {
		chart: {
			type: 'line',
			zoom: false,
			toolbar: {
        show: false,
			}
		},
		series: [],
		dataLabels: {
			enabled: true
		},
	};

	var kategori_seminar = {
		chart: {
			type: 'donut',
		},
		series: [44, 55, 41, 17, 15],
		chartOptions: {
			labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
		}
	};

	var dominasi = {
		series: [{
			name: 'Peserta',
			data: [22, 50, 30],
		}],
			chart: {
			height: 350,
			type: 'radar',
			toolbar: {
        show: false,
			}
		},
		xaxis: {
			categories: ['Seminar Proposal', 'Seminar Hasil', 'Sidang Skripsi']
		}
	};

	var webVisit = new ApexCharts(document.querySelector("#chart"), webVisitOpt);
	var webAkun = new ApexCharts(document.querySelector("#chart2"), webAkunOpt);
	var chart3 = new ApexCharts(document.querySelector("#chart3"), kategori_seminar);
	var chart4 = new ApexCharts(document.querySelector("#chart4"), kategori_seminar);
	var chart5 = new ApexCharts(document.querySelector("#chart5"), kategori_seminar);
	var chart6 = new ApexCharts(document.querySelector("#chart6"), dominasi);

	webVisit.render();
	webAkun.render();
	chart3.render();
	chart4.render();
	chart5.render();
	chart6.render();

	$.getJSON('<?= base_url('ajax/get_visitor') ?>', function(response) {		
		webVisit.updateSeries([{
			name: 'Visitor',
			data: response.visitor
		},{
			name: 'Unique Visitor',
			data: response.unique_visitor
		}])
	});

	$.getJSON('<?= base_url('ajax/get_user') ?>', function(response) {		
		webAkun.updateSeries([{
			name: 'Register',
			data: response.register
		},{
			name: 'Belum Diverifikasi',
			data: response.unverified
		}])
	});

	setInterval(()=> {
		$.getJSON('<?= base_url('ajax/get_visitor') ?>', function(response) {		
			webVisit.updateSeries([{
				name: 'Visitor',
				data: response.visitor
			},{
				name: 'Unique Visitor',
				data: response.unique_visitor
			}])
		});
	}, 30000)

</script>
