<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Profile</a></li>
		<li class="active">Rencana Pernikahan</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<?php require "sidebar-member.php" ?>
			<div class="col-md-9">
				
					<?php 
						  	$sql="SELECT t_plan.*, (SELECT SUM(harga) FROM t_detail_plan WHERE plan_id = ".$_GET['id'].") as biaya FROM t_plan WHERE id =".$_GET['id'];
			     			$result = $db->query($sql);
			     			$data = $result->fetch_object();
				   	?>
					<div class="content_dash">
						<h4 class="detail-header">
							Rencana Pernikahan
						</h4>
						<div class="panel panel-default plan-summary">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-2 col-25">
										<h4 class="sc-title">Rencanan Pernikahan</h4>
									</div>
									<div class="col-md-2 col-25">
										Tanggal Pernikahan <span><?= date('d F Y', strtotime($data->wedding_date)) ?></span>
									</div>
									<div class="col-md-2 col-25">
										Jumlah Undangan <span><?= $data->jml_undangan ?></span>
									</div>
									<div class="col-md-2 col-25">
										Total Budget <span><?= number_format($data->budget, 2, ',','.'); ?></span>
									</div>
									<div class="col-md-2 col-25">
										Total Biaya <span>Rp. <?= number_format($data->biaya, 2, ',','.'); ?></span>
									</div>
								</div>
							</div>
						</div>
									<div class="alert alert-info">
				<p>Fitur ini hanya untuk Gambaran dan Kalkulasi dalam Biaya Rencana Pernikahan, bukan untuk Memesan.. Silahkan Hubungi Vendor terkait yang ada pada Halaman Vendor Profil. </p>
			</div>
						<?php 
							$sql="SELECT * FROM t_detail_plan dp INNER JOIN t_produk pr ON pr.id = dp.produk_id  INNER JOIN t_vendor v ON v.id = pr.vendor_id WHERE plan_id =".$_GET['id'];
			     			$result = $db->query($sql);
			     			$directory = dirname(__FILE__).'/uploads/';
						 ?>
						 <?php if($result->num_rows > 0): ?>
						 	<?php while($data = $result->fetch_object()): ?>
								<div class="product product-list">
									<div class="row">
										<div class="col-md-3">
											<a href="product-detail.php?id=<?= $data->produk_id; ?>">
												<?php if($data->featured_image != "" && file_exists($directory.$data->featured_image)): ?>
													<img src="uploads/thumb/<?= $data->featured_image; ?>"  class="img-responsive" width="100">
												<?php else: ?>
													<img src="images/product.jpg" class="img-responsive" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
												<?php endif; ?>
											</a>
										</div>
										<div class="col-md-6">
											<h5 class="prod-title"><a href="product-detail.php?id=<?=$data->produk_id?>"><?= $data->nama_produk; ?></a></h5>
											<div class="product-author">by <a href="vendor-detail.php?id=<?= $data->vendor_id ?>"><?= $data->name ?></a></div>
											<p><?= $data->desc ?></p>
										</div>
										<div class="col-md-3">
											<div class="product-price">Rp. <?= number_format($data->harga, 2, ',','.'); ?></div>
											<a class="btn btn-info" href="product-detail.php?id=<?=$data->produk_id?>">Lihat</a>
											
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php else: ?>
							<p>Tidak Ada</p>
						<?php endif; ?>

					</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>