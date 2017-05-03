<div class="container">
	<div class="visible-sm visible-xs ">
		<h5 class="sc-heading text-center">Current Step</h5>
	</div>

	<section id="step">
		<div class="row">
			<div class="col-md-3">
				<div class="step first <?php echo isset($_GET['step']) && $_GET['step'] == 1 ? 'active' : '' ?>">
					<div class="counter">1</div>
					Informasi Pernikahan
				</div>
			</div>
			
			<div class="col-md-3 hidden-xs hidden-sm">
				<div class="step <?php echo isset($_GET['step']) && $_GET['step'] == 2 ? 'active' : '' ?>">
					<div class="counter">2</div>
					Pilih Kategori
				</div>
			</div>
			<div class="col-md-3 hidden-xs hidden-sm">
				<div class="step <?php echo isset($_GET['step']) && $_GET['step'] == 3 ? 'active' : '' ?>">
					<div class="counter">3</div>
					Pilih Produk
				</div>
			</div>
			<div class="col-md-3 hidden-xs hidden-sm">
				<div class="step last <?php echo isset($_GET['step']) && $_GET['step'] == 4 ? 'active' : '' ?>">
					<div class="counter">4</div>
					Selesai
				</div>
			</div>
		</div>

	</section>
</div>
