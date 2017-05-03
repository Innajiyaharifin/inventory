<?php  require_once("connection.php"); ?>
<div class="container">
	<section class="step-content">
		<div class="row">
			<h3 class="sc-heading text-center">Pilih Kategori</h3>
			<div class="col-md-8 col-center category-holder select-category">
				<div class="row">
					<?php 
						$sql="SELECT * FROM t_kategori";
						$result = $db->query($sql);
						if($result->num_rows > 0):
					?>
						<?php while($data = $result->fetch_object()): ?>
					<div class="col-sm-2 col-25 col-xs-6">
						<a class="category photography" data-category='<?= $data->id ?>'>
							<div class="cat-icon">
								<span></span>
							</div>
							<div class="cat-text"><?= $data->nama_kategori; ?></div>
						</a>
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
					
				</div>
			</div>
			<div class="button-holder text-center">
				<form class="form form-horizontal" action="proses_step2.php" method="post">
					<input type="hidden" name="step" value="3">
					<input type="hidden" name="category" id="category" value="">
					<a class="btn btn-primary" href="plan.php?step=1">Kembali</a>
					<input type="submit" value="Lanjutkan" class="btn btn-pink" id="btn-next" disabled=disabled>
				</form>
			</div>
		</div>
	</section>
</div>
