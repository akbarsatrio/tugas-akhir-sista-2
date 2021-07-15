<!-- End Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $this->assets_sista('vendor/bootstrap/js/popper.js') ?>"></script>
<script src="<?= $this->assets_sista('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= $this->assets_sista('vendor/select2/select2.min.js') ?>"></script>
<script src="<?= $this->assets_sista('vendor/tilt/tilt.jquery.min.js') ?>"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>
<script>
	$(document).ready(function(){
		let style = $('body link, body style');
		if(style){
			for (let key in style) {
				$('head').append(style[key].outerHTML);
				style[key].remove();	
			}
		}
	})
</script>
<script src="lib/js/main.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
