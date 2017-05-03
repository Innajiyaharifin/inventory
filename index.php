<?php require "connection.php"; ?>
<?php require "header.php"; ?>
	<section id="starter-wizzard" class="parallax-window" data-parallax="scroll" data-position="top left">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-7 col-xs-10 col-center">
					<div class="panel panel-default">
						<div class="panel-heading" style="height:150px;">
							<!--<h4 class="sc-heading">Rencanakan Pernikahan Anda</h4>
						</div>-->
						<!--<div class="panel-body">
							<form class="form form-inline" action="plan.php" role="form" method="get"> <!--inline fungsinya supaya inputan nya sejajar 
								<input type="hidden" name="step" value="1">
								<div class="form-group">
									<label class="sr-only" for="inputBudget">Budget Anda</label>
									<div class="input-group">
								      <div class="input-group-addon">$</div>
								      <input type="text" class="form-control" id="inputBudget" placeholder="Budget">
								    </div>
								</div>
								<div class="form-group">
									<label class="sr-only" for="inputBudget">Budget Anda</label>
									<div class="input-group">
								    	<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
										<input type="text" class="form-control" id="nameInput" placeholder="Jumlah Undangan">
									</div>
								</div>
								<div class="form-group">
									<input type="submit" value="Rencanakan" class="btn btn-pink btn-block">
								</div>
							</form>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</section>

	
	<div class="container">
		<section id="fav-product">
			<h4 class="text-center mb50">Program Inventory Warehouse</h4>
			<div class="row">
			<?php
     			$per_page = 8;
     			
				if (isset($_GET["page"]))
					$page  = $_GET["page"];
				else  
					$page=1;

				$start_from = ($page-1) * $per_page;
				$sql="SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.name as vendorname from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id INNER JOIN t_user ON t_user.id = t_vendor.user_id WHERE t_user.status = 1 AND t_produk.status = 1 LIMIT $start_from, $per_page";
				$result = $db->query($sql);
				$directory = dirname(__FILE__).'/uploads/';
			?>
			<?php if($result->num_rows > 0):
						$i = 1;?>
				<?php while($data = $result->fetch_object()): ?>
				<div class="col-md-3 col-sm-6 product">
					<div class="product-thumb">
						<a href="product-detail.php?id=<?= $data->id ?>" class="product-img">
							<?php if($data->featured_image != "" && file_exists($directory.$data->featured_image)): ?>
								<img src="uploads/thumb/<?= $data->featured_image; ?>"  class="img-responsive">
							<?php else: ?>
								<img src="images/product.jpg" class="img-responsive" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
							<?php endif; ?>
						</a>
						
						<div class="product-detail">
							<h5><a href="product-detail.php?id=<?= $data->id; ?>"><?= $data->nama_produk; ?></a></h5>
							<div class="author">by <a href="vendor-detail.php?id=<?= $data->vendor_id ?>"><?= $data->vendorname ?></a></div>
							<a class="btn-pink btn-sm btn" href="product-detail.php?id=<?= $data->id ?>">Selengkapnya</a>
						</div>
					</div>
				</div>
					<?php if($i%4 == 0): ?> <!-- setiap 3 item yang ditampilkan, row nya akan ditutup -->
						</div><div class="row">
					<?php endif; $i++; ?>
					<?php endwhile ;?>
			</div>
			<div class="text-center">
				<a class="btn btn-md btn-primary" href="product.php">Lihat Produk Lainnya</a>
			</div>
			<?php else: ?>
				<p class="text-center"></p>
			<?php endif; ?>

		</section>
	</div>
<?php require "footer.php"; ?>