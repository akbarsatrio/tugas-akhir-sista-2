<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $content['title'] ?? 'Sistem Informasi Tugas Akhir' ?></title>
	<!--
		Akan load view php yanga ada di
		folder views/includes/style.php
		yang berisi style css
	-->
	<?php $this->load->view("includes/style") ?>
</head>
<body>
	<?php if($this->session->userdata('user_role') == '1') { //1 = Dosen (by default) ?> 

		<?php $this->load->view("includes/navbar-dosen") ?>
		<!--
		Akan load view php yanga ada di
		folder views/pages sesuai dari
		variabel $pages ($data['pages'])
		pada controller 
		-->
		<div class="ml-auto" style="width: 82%;">
			<?php $this->load->view("pages/$pages") ?>


			<!-- Start Footer -->
			<footer class="py-5">
				<div class="container">
					<div class="row">
						<div class="col">
							<span>Copyright 2020</span>
							<span class="float-right">Kelompok 8</span>
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer -->
		</div>

	<?php } else { ?>

		<?php $this->load->view("includes/navbar") ?>
		<!--
		Akan load view php yanga ada di
		folder views/pages sesuai dari
		variabel $pages ($data['pages'])
		pada controller 
		-->
		<?php $this->load->view("pages/$pages") ?>


		<!-- Start Footer -->
		<footer class="py-5">
			<div class="container">
				<div class="row">
					<div class="col">
						<span>Copyright 2020</span>
						<span class="float-right">Kelompok 8</span>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
		
	<?php } ?>
	
	<!--
		Akan load view php yanga ada di
		folder views/includes/script.php
		yang berisi script javascript
	-->
	<?php $this->load->view("includes/script") ?>
</body>
</html>
