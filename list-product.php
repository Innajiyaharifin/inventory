<?php 
require_once "header.php"; 
require_once "connection.php"; 
?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Product</li>
	</ul>
</div>
		<div class="container content">
			<div class="row">
			<!--<?php// require "sidebar-vendor.php"; ?>-->

				<!--===============================-->
				<!--== Post =======================-->
				<!--===============================-->
				<div class="col-md-12">
							<h1 class="mb20">Produk
									<a href="add-product.php" class="btn btn-sm btn-success pull-right">Tambah Produk</a>
							</h1>
						
						<?php
			     		 			$per_page = 9;
		     			
						if (isset($_GET["page"])) //ngecek ada page apa engga (bisa diliat di URL)
							$page  = $_GET["page"]; //jika ada maka set si page nya
						else  
							$page=1; //kalo ga ada, maka page itu di set jadi 1

						if(isset($_GET['cat'])) //di cek ada kategori apa engga
							$cat = $_GET['cat']; //kalo ada maka set si kategori nya

						$start_from = ($page-1) * $per_page; //ini mulai tampilkan record (contoh kita lagi di page 1, dikurangin 1 terus dikali jumlah perpage, maka hasilnya 1 ini cobain aja di php)
				$vendor_id = $_SESSION['user_id'];
							$start_from = ($page-1) * $per_page;
							$sql="SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id WHERE status = 1";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
				        <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
    					<tr>
  							<th>Image</th>
  							<th>SKU</th>
  							<th>Kategori</th>
  							<th>Nama Barang</th>
  							<th>Jumlah Stok</th>
  							<th>Nomor Rak</th>
  							<th>Status</th>
  							<th>Action</th>
  						</tr>
  
  </thead>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							  							<td>
  								<?php if($data['featured_image'] != "" && file_exists($directory.$data['featured_image'])): ?>
									<img src="uploads/thumb/<?= $data['featured_image']; ?>"  class="img-responsive" width="50">
								<?php else: ?>
									<img src="images/product.jpg" class="img-responsive" width="50" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
								<?php endif; ?>
  							</td>	
  							
  							<td><?=$data['sku']?></td>
  							<td><?=$data['nama_kategori']?></td>
  							<td><?=$data['nama_produk']?></td>
							  		<td><?php
											$sku=$data['sku'];
											$sql2= "select sum(barang_masuk) as total from barang_masuk where sku='$sku'";
											$result2 = $db->query($sql2);
											$data2 = $result2->fetch_assoc();
											 
											$sql3= "select sum(barang_keluar) as totalkeluar from barang_keluar where sku='$sku'";
											$result3 = $db->query($sql3);
											$datakeluar = $result3->fetch_assoc();
											echo $data2['total']-$datakeluar['totalkeluar'];


										?>
								</td>
							<td><?=$data['no_rak']?></td>
							
							<td><?=$data['stts']?></td>
  							<td>
  								<a href="barang_masuk.php?sku=<?= $data['sku'] ?>" <i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;

  								<a href="barang_keluar.php?sku=<?= $data['sku'] ?>" <i class="fa fa-minus-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;

  <!--								<a href="gallery.php?id=<?= $data['id'] ?>" class="btn btn-success btn-xs">Pindah Gudang</a>-->
  								<a href="update-product.php?sku=<?= $data['sku'] ?>" <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;

  								<a href="delete-product.php?id=<?= $data['id'] ?>" <i class="fa fa-trash" aria-hidden="true"></i>
 
  							</td>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table><!--
				<div class="terodxt-center">
						<ul class="pagination">
							<?php 
					$sql="SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id WHERE status = 1";
						$result = $db->query($sql);
								$record = $result->num_rows;
								$total_page = ceil($record / $per_page);
							 ?>
							<?php if($total_page != 1 && $page != 1): ?>
						    <li>
						      <a href="list-product.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<li><a href="list-product.php?page=<?= $i; ?>"><?=$i?></a></li>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						    <li>
						      <a href="list-product.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						</ul>-->
					</div>
				</div>

			</div>
		</div>
<?php require "footer.php"; ?>