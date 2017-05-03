<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<?php 
	if(isset($_GET) && count($_GET) > 0)
		$id = $_GET['id'];
	else
		$id = $_SESSION['vendor_id'];

	$sql= "SELECT v.*, u.email FROM t_vendor v INNER JOIN t_user u ON u.id = v.user_id  WHERE v.id=$id";
	$result = $db->query($sql);
	$data = $result->fetch_assoc();
?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
	<li><a href="vendor.php">Vendor</a></li>
	
		<li class="active"><?= $data['name'] ?></li>
	</ul>
</div>
	<div class="container">
		<div class="row">
		<?php require "sidebar-unvendor.php" ?>
			<div class="col-md-9">
				

				<h4 class="detail-header">List Produk</h4>
				  
				 
				 <?php
	     			$per_page = 8;
	     			$vendor_id = $_GET['id'];
	     			
					if (isset($_GET["page"]))
						$page  = $_GET["page"];
					else  
						$page=1;

					$start_from = ($page-1) * $per_page;
					$sql="SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.name as vendorname from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id WHERE vendor_id = $vendor_id AND t_produk.status = 1 LIMIT $start_from, $per_page";
					$result = $db->query($sql);
					$directory = dirname(__FILE__).'/uploads/';
				?>
				<div class="row">
				<?php if($result->num_rows > 0): $i = 1; ?>
					<?php while($data = $result->fetch_object()): ?>
					<div class="col-md-4 col-sm-6 product">
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
					<?php 

						if($i%3 == 0): ?>
						</div><div class="row">
					<?php endif; $i++; ?>

					<?php endwhile; ?>
					
				</div>	
				<div class="text-center">
				<ul class="pagination">
					<?php 
						$sql = "SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.name as vendorname from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id WHERE vendor_id = $vendor_id";
						$result = $db->query($sql);
						$record = $result->num_rows;
						$total_page = ceil($record / $per_page);
					 ?>
					<?php if($total_page != 1 && $page != 1): ?>
				    <li>
				      <a href="product.php?page=1" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
					<?php endif; ?>
				    <?php for($i=1; $i<=$total_page; $i++): ?>
						<li><a href="product.php?page=<?= $i; ?>"><?=$i?></a></li>
						
					<?php endfor; ?>
					<?php if($total_page != 1 && $page != $total_page): ?>
				    <li>
				      <a href="product.php?page=<?= $total_page ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
					<?php endif; ?>
				</ul>
				</div>
			<?php else: ?>
				<p class="text-center">
					Vendor Tidak Memiliki Produk
				</p>
			<?php endif; ?>
			
			
		</div>
		</div>

	</div>
<?php require "footer.php"; ?>