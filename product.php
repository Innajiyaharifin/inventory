<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Produk</li>
	</ul>
</div>
	<div class="container">
		
			
		<div class="row">
			<div class="col-md-3">
				<div class="category-holder-vertical">
					<h4 class="sc-title">Kategori</h4>
					<ul class="category-vertical">
						<?php 
							$sql="SELECT * from t_kategori";
							$result = $db->query($sql); 
						?>

						<?php if($result->num_rows > 0): ?>
							<?php while($data = $result->fetch_object()): ?>
						<li>
							<a class="category photography" href="product.php?cat=<?= $data->id; ?>" data-category='photography'>
								<div class="cat-icon">
									<span></span>
								</div>
								<div class="cat-text"><?= $data->nama_kategori; ?></div>
							</a>
						</li>
							<?php endwhile; ?>
						<?php else: ?>
							<li>Tidak ada Kategori</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<?php
		     			$per_page = 9;
		     			
						if (isset($_GET["page"])) //ngecek ada page apa engga (bisa diliat di URL)
							$page  = $_GET["page"]; //jika ada maka set si page nya
						else  
							$page=1; //kalo ga ada, maka page itu di set jadi 1

						if(isset($_GET['cat'])) //di cek ada kategori apa engga
							$cat = $_GET['cat']; //kalo ada maka set si kategori nya

						$start_from = ($page-1) * $per_page; //ini mulai tampilkan record (contoh kita lagi di page 1, dikurangin 1 terus dikali jumlah perpage, maka hasilnya 1 ini cobain aja di php)
						if(isset($_GET['cat']))
							$sql="SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.name as vendorname from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id WHERE t_kategori.id = $cat LIMIT $start_from, $per_page";
						else
							$sql="SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.name as vendorname from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id LIMIT $start_from, $per_page";
						$result = $db->query($sql);
						$directory = dirname(__FILE__).'/uploads/';
					?>
					<?php if($result->num_rows > 0): 
					$i = 1; //ini diset sebagai urutan keberapa ?>
					<?php while($data = $result->fetch_object()): ?>
					<div class="col-md-4 col-sm-6 product">
						<div class="product-thumb">
							<a href="product-detail.php?id=<?= $data->id ?>" class="product-img">
								<?php if($data->featured_image != "" && file_exists($directory.$data->featured_image)): ?><!-- ini cek dan menampilkan gambar product kalo ada -->
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
					<?php if($i%3 == 0): ?> <!-- setiap 3 item yang ditampilkan, row nya akan ditutup -->
						</div><div class="row">
					<?php endif; $i++; ?>
					<?php endwhile; ?>
					<?php else: ?>				
						<p>Tidak ada produk</p>
					<?php endif; ?>
					
				</div>	
				<div class="text-center">
						<ul class="pagination">
							<?php 
								$sql = "SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id";
								$result = $db->query($sql);
								$record = $result->num_rows;
								$total_page = ceil($record / $per_page);
							 ?>
							<?php if($total_page != 1 && $page != 1): ?>
						      <a href="product.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<a href="product.php?page=<?= $i; ?>"><?=$i?></a>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						      <a href="product.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
							<?php endif; ?>
						</ul>
					</div>
			</div>
			
		</div>

	</div>
<?php require "footer.php"; ?>