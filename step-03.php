<?php  require_once("connection.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">	
				<div class="panel-body">	

					<p>	
						<label>Budget</label>
						<span>Rp. <?= number_format($_SESSION['budget'], 2, ',','.') ?></span>
					</p>
					<p>	
						<label>Sisa Budget</label>
						<span id="sisaBudget">Rp. <?= number_format($_SESSION['sisaBudget'], 2, ',','.') ?></span>
					</p>
				</div>
			</div>
			<div class="category-holder-vertical">
				<h4 class="sc-title">Kategori Produk</h4>
				<ul class="category-vertical">
					<?php 
						$kategori = implode(',', $_SESSION['category']);
						$budget = $_SESSION['budget'];
						$sql="SELECT * FROM t_kategori WHERE id IN($kategori)  ";
						$result = $db->query($sql);
						if($result->num_rows > 0):
					?>
						<?php 	while($data = $result->fetch_object()): ?>
					<li>
						<a class="category photography" href="plan.php?step=3&amp;cat_id=<?= $data->id ?>">
							<div class="cat-icon">
								<span></span>
							</div>
							<div class="cat-text"><?= $data->nama_kategori ?></div>
						</a>
					</li>
							<?php 	endwhile; ?>
						<?php 	endif; ?>
					
				</ul>
			</div>
		</div>
		
		<div class="col-md-9">
			<?php 	
			
				if(!isset($_GET['cat_id']) ) 
					$cat_id = $_SESSION['category'][0];
				else
					$cat_id = $_GET['cat_id'];

					$sql="SELECT t_produk.*, t_vendor.name FROM t_produk JOIN t_vendor ON t_vendor.id = t_produk.vendor_id WHERE kategori_id=$cat_id AND harga <= $budget";
				$result = $db->query($sql);
				
				if($result->num_rows > 0):
			?>
			<?php 	while($data = $result->fetch_assoc()): ?>
			<div class="product product-list <?= in_array($data['id'], $_SESSION['sel_product'])? 'product-active' : '' ?>" id="product-<?=$data['id']?>">
				<div class="row">
					<div class="col-md-3">
						<a href="product-detail.php">
							<img src="uploads/thumb/<?=$data['featured_image']?>" class="img-responsive">
						</a>
					</div>
					<div class="col-md-6">
						<h5 class="prod-title"><a href="product-detail.php?id=<?=$data['id']?>"><?=$data['nama_produk']?></a></h5>
						<div class="product-author">by <a href="#"><?= $data['name'] ?></a></div>
					</div>
					<div class="col-md-3">
						<div class="product-price">Rp. <?= number_format($data['harga'],2, ',','.')?></div>
						<?php if(isset($_SESSION['sel_product']) && in_array($data['id'], $_SESSION['sel_product'])): ?>
							<form class="form form-unselect" action="unselect_product.php" method="post">
						<?php else: ?>
							<form class="form form-select" action="select_product.php" method="post">
						<?php endif; ?>
							<?php if(isset($_SESSION['sel_product']) && in_array($data['id'], $_SESSION['sel_product'])): ?>
								<input type="hidden" name="method" value="remove">
							<?php else: ?>
								<input type="hidden" name="method" value="add">
							<?php endif; ?>
							<input type="hidden" name="product_id" value="<?= $data['id'] ?>">
							<input type="hidden" name="harga" value="<?= $data['harga'] ?>">
							<input type="hidden" name="cat_id" value="<?= $data['kategori_id'] ?>">
							<?php if(isset($_SESSION['sel_product']) && in_array($data['id'], $_SESSION['sel_product'])): ?>
									<input type="submit" class="btn btn-pink" value="Batal">
								<?php 	else: ?>
									<input type="submit" class="btn btn-pink" value="Pilih">
								<?php 	endif; ?>
									</form>
					</div>
				</div>
			</div>
					<?php 	endwhile; ?>
			<?php else: ?>
				<p>Tidak ada produk</p>
			<?php endif; ?>
			
		</div>
		<div class="button-holder text-center">
			
			<form id="act-step-3" action="proses_step3.php" method="post">
				<input type="hidden" name="step" value="4">
				<a class="btn btn-primary" href="plan.php?step=2">Kembali</a>
				<?php if(isset($_SESSION['sel_product']) && count($_SESSION['sel_product'])): ?>
					<a class="btn btn-pink btn-finish" href="#">Selesai</a>
					<a class="btn btn-pink btn-noitem hide" href="#" disabled=disabled>Selesai</a>
				<?php else: ?>
					<a class="btn btn-pink btn-finish hide" href="#">Selesai</a>
					<a class="btn btn-pink btn-noitem" href="#" disabled=disabled>Selesai</a>
				<?php endif; ?>
			</form>
		</div>
	</div>

</div>