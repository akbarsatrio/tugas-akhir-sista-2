<section class="pt-5">
	<div class="container">
		<div class="wrapper bg-white mt-3">
			<div class="wrapper__outer">
				<div class="col-md-6 mx-auto text-center">
					<img src="<?=  $this->assets_sista("img/{$content['image']}") ?>" alt="" class="img-fluid">
					<h2 class="text-bold text-center"><?= $content['head'] ?></h2>
					<p><?= $content['body'] ?></p>
					<em class="d-block"><?= "Kode : {$content['code']}" ?></em>
					<a href="<?= base_url() ?>" class="btn btn-primary btn_mod my-3">Kembali ke Home</a>
				</div>
			</div>
		</div>
	</div>
</section>
