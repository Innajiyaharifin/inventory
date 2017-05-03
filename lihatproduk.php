<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<?php
			     			$per_page = 8;
			     			
							if (isset($_GET["page"]))
								$page  = $_GET["page"];
							else  
								$page=1;
							$vendor_id = $_SESSION['vendor_id'];
							$start_from = ($page-1) * $per_page;
				
							$kd_gudang=$_GET['kd_gudang'];
							$sql= "SELECT t_produk.*, t_gudang.stok_gudang FROM t_gudang INNER JOIN t_produk on t_gudang.produk_id=t_produk.id WHERE kd_gudang=".$kd_gudang." LIMIT $start_from, $per_page";
							var_dump($sql);
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
				<table class="table table-striped">
  						<tr>
  							<th>SKU</th>
  							<th>Nama Barang</th>
  							<th>Jumlah Stok</th>
  							<th>Image</th>
  							<th>Action</th>
  						</tr>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							<td><?=$data['sku']?></td>
  							<td><?=$data['nama_produk']?></td>
  							<td><?=$data['stok_gudang']?></td>
  							<td>
  								<?php if($data['featured_image'] != "" && file_exists($directory.$data['featured_image'])): ?>
									<img src="uploads/thumb/<?= $data['featured_image']; ?>"  class="img-responsive" width="50">
								<?php else: ?>
									<img src="images/product.jpg" class="img-responsive" width="50" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
								<?php endif; ?>
  								
  							</td>
  							<td>
  								<a href="product-detail.php?id=<?= $data['id'] ?>" class="btn btn-info btn-xs">Detail</a>
  								<a href="gallery.php?id=<?= $data['id'] ?>" class="btn btn-pink btn-xs">History</a>
  								<a href="gallery.php?id=<?= $data['id'] ?>" class="btn btn-success btn-xs">Pindah Gudang</a>
  								<a href="update-product.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-xs">Ubah</a>
  								<a href="delete-product.php?id=<?= $data['id'] ?>" class="btn confirm-delete btn-danger btn-xs">Hapus</a> 
  							</td>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table>
					<div class="text-center">
						<ul class="pagination">
							<?php 
								$sql = "SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id";
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
				</div>


			</div>
		</div>

<?php require "footer.php"; ?>