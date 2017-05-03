<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
	
	
		<li class="active">Profile</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="user-panel">
					<div class="text-center">
						<img src="images/default.png" class="img-responsive img-circle img-thumbnail">
						<h3>OMOI</h3>
						<p>
							Bandung, Indonesia
						</p>
					</div>
					<ul class="menu">
						<li>
							<a href="vendor-profile.php">
								<i class="fa fa-user"></i> My Profile
							</a>
						</li>
						<li>
							<a href="vendor-product.php">
								<i class="fa fa-user"></i> List Produk
							</a>
						</li>
						<li>
							<a href="edit-vendor.php">
								<i class="fa fa-pencil"></i> Edit Profile
							</a>
						</li>
						<li>
							<a href="add-product.php">
								<i class="fa fa-pencil"></i> Pasang Iklan
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				

					<div class="content_dash">
						<h4 class="detail-header">
							List Product
						</h4>
						 <div class="row">
						 <?php
						 	$vendor_id = $_SESSION['vendor_id'];
						 	$sql="SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id WHERE vendor_id=".$vendor_id;
						 	//$sql="SELECT * from t_produk";
			     			$result = $db->query($sql);
//			     			$vendor = $result->fetch_object();

						 ?>
						 <?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<div class="col-md-4 col-sm-6 product">
								<div class="product-thumb">
									<a href="product-detail.php" class="post-image">
										<img src="uploads/thumb/<?=$data['featured_image']?>" alt="Post" class="img-responsive">
									</a>
									<div class="product-detail">
										<h5><?=$data['nama_produk']?></a></h5>
										<div class="author"><?=$data['nama_kategori']?></a></div>
										<div class="author">Rp. <?=$data['harga']?></a></div>
										<a class="btn-pink btn" href="product-detail.php?id=<?= $data['id'] ?>">Read More</a>
									</div>
								</div>
							</div>
							<?php 
								$i++; 
								if($i%3 == 0): ?>
								</div><div class="row">
							<?php endif; ?>
							<?php endwhile ;?>
						<?php endif ;?>
							
						</div>	

					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>