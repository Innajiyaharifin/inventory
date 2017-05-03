<?php 
require_once "header.php"; 
require_once "connection.php"; 
?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Daftar Gudang</li>
	</ul>
</div>
		<div class="container content">
			<div class="row">
			<!--<?php// require "sidebar-vendor.php"; ?>-->

				<!--===============================-->
				<!--== Post =======================-->
				<!--===============================-->
				<div class="col-sm-9">
							<h1 class="mb20">Daftar Gudang
									<a href="add-gudang.php" class="btn btn-sm btn-success pull-right">Tambah Gudang</a>
							</h1>
						
						<?php
			     			$per_page = 8;
			     			
							if (isset($_GET["page"]))
								$page  = $_GET["page"];
							else  
								$page=1;
							$vendor_id = $_SESSION['vendor_id'];
							$start_from = ($page-1) * $per_page;
							$sql="SELECT * FROM t_daftar_gudang LIMIT $start_from, $per_page";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
					<table class="table table-striped">
  						<tr>
  							<th>Kode Gudang</th>
  							<th>Nama Gudang</th>
  							<th>Jumlah Item</th>
  							<th>Total Rak</th>
  							<th>Action</th>
  						</tr>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							<td><?=$data['kd_gudang']?></td>
  							<td><?=$data['nama_gudang']?></td>
  							<td><?=$data['total_item']?></td>
  							<td><?=$data['total_rak']?></td>
  							</td>
  							<td>
  								<a href="gudang-detail.php?id=<?= $data['id'] ?>" class="btn btn-info btn-xs">Detail</a>
  								<a href="update-gudang.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-xs">Ubah</a>
  								<a href="delete-gudang.php?id=<?= $data['id'] ?>" class="btn confirm-delete btn-danger btn-xs">Hapus</a> 
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