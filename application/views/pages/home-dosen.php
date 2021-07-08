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
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
						<div class="col-md-2 col-6 mb-3 pl-0">
							<div class="bg-primary rounded p-5"></div>
						</div>
					</div>
				</div>
				<hr>
				<div id="statistik">
					<div class="col p-0 mb-5">
						<h5 class="text-bold">Jumlah Pengunjung</h5>
						<hr width="25" align="left" class="bg-dark" style="height: 1px;">
						<div id="jumlah-pengunjung"></div>
					</div>
					<div class="row">
						<div class="col-lg-6 mb-5">
							<h5 class="text-bold">Jumlah Akun yang Terdaftar</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="akun-terdaftar"></div>
						</div>
						<div class="col-lg-6">
							<h5 class="text-bold">Kategori yang Disukai Peserta</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="kategori-disukai"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-6 mb-5">
							<h5 class="text-bold">Persentase Seminar Berdasarkan Kategori</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="persentase-seminar"></div>
						</div>
						<div class="col-xl-4 col-lg-6 mb-5">
							<h5 class="text-bold">Persentase Pengguna Berdasarkan Tahun Angkatan</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="persentase-pengguna"></div>
						</div>
						<div class="col-xl-4 col-lg-6 mb-5">
							<h5 class="text-bold">Sentimen Dosen terhadap Nilai Seminar</h5>
							<hr width="25" align="left" class="bg-dark" style="height: 1px;">
							<div id="persentase-kehadiran"></div>
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
		noData: {
			text: 'Loading...'
		},
	};

	var persentase = {
		series: [],
		chart: {
			width: 380,
			type: 'donut',
		},
		plotOptions: {
			pie: {
				donut: {
					labels: {
						show: true,
						total: {
							show: true,
							showAlways: true,
						}
					}
				},
			},
		},
		dataLabels: {
			enabled: true
		},
		legend: {
			position: 'bottom',
			offsetY: 0,
		},
		labels: [],
		noData: {
			text: 'Loading...'
		},
	};

	var webSeminarOpt = {
		series: [],
			chart: {
			height: 350,
			type: 'radar',
			toolbar: {
        show: false,
			},
		},
		yaxis: [{
        "labels": {
            "formatter": function (val) {
                return val.toFixed()
            }
        }
    }],
		noData: {
			text: 'Loading...'
		},
	};

	var sentimen = {
		series: [],
			chart: {
			height: 300,
			type: 'radialBar',
			offsetY: -10
		},
		plotOptions: {
			radialBar: {
				startAngle: -135,
				endAngle: 135,
				dataLabels: {
					name: {
						fontSize: '16px',
						color: undefined,
						offsetY: 120
					},
					value: {
						offsetY: 76,
						fontSize: '22px',
						color: undefined,
						formatter: function (val) {
							return val + "%";
						}
					}
				}
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
					shade: 'dark',
					shadeIntensity: 0.15,
					inverseColors: false,
					opacityFrom: 1,
					opacityTo: 1,
					stops: [0, 50, 65, 91]
			},
		},
		stroke: {
			dashArray: 4
		},
		labels: [],
		noData: {
			text: 'Loading...'
		},
	}

	var webVisit = new ApexCharts(document.querySelector("#jumlah-pengunjung"), webVisitOpt);
	var webAkun = new ApexCharts(document.querySelector("#akun-terdaftar"), webAkunOpt);
	var webSeminar = new ApexCharts(document.querySelector("#kategori-disukai"), webSeminarOpt);
	var webPersentaseSem = new ApexCharts(document.querySelector("#persentase-seminar"), persentase);
	var webPersentasePen = new ApexCharts(document.querySelector("#persentase-pengguna"), persentase);
	var webSentimen = new ApexCharts(document.querySelector("#persentase-kehadiran"), sentimen);

	webVisit.render();
	webSeminar.render();
	webAkun.render();
	webPersentaseSem.render();
	webPersentasePen.render();
	webSentimen.render();

	function getJSON(){
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

		$.getJSON('<?= base_url('ajax/get_seminar_liked_by_peserta') ?>', function(response) {		
			webSeminar.updateSeries([{
				name: 'Peserta',
				data: response
			}])
		});

		$.getJSON('<?= base_url('ajax/get_persentase/seminar') ?>', function(response) {		
			webPersentaseSem.updateOptions({
				series: response.series,
				labels: response.labels
			})
		});

		$.getJSON('<?= base_url('ajax/get_persentase/pengguna') ?>', function(response) {		
			webPersentasePen.updateOptions({
				series: response.series,
				labels: response.labels
			})
		});
		
		$.getJSON('<?= base_url('ajax/get_persentase/sentimen') ?>', function(response) {		
			webSentimen.updateOptions({
				series: response.series,
				labels: response.labels
			})
		});

	}

	getJSON();

	setInterval(()=> {
		getJSON()
	}, 15000)

</script>
