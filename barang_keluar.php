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
				<div class="col-sm-9">
							<h1 class="mb20">Produk

						<a href="kurangi_stok.php?sku=<?=$_GET['sku'] ?>" class="btn btn-sm btn-success pull-right">Kurangi Stok</a>

							</h1>

						
						<?php
			     			$per_page = 8;
			     			
							if (isset($_GET["page"]))
								$page  = $_GET["page"];
							else  
								$page=1;
							$start_from = ($page-1) * $per_page;
							$sql="SELECT t_produk.sku, barang_keluar.* from t_produk INNER JOIN barang_keluar on t_produk.sku=barang_keluar.sku WHERE barang_keluar.sku='$_GET[sku]'";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
        <table id="example1" class="table table-bordered table-hover">
                <thead>
    							<tr>
  							<th>Tanggal</th>
  							<th>SKU</th>
  							<th>Nama Barang</th>
  							<th>Jumlah Stok Masuk</th>
  							<!--<th>Petugas</th>-->
  						</tr>
  	</thead>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
					
							<tr>
  							<td><?=$data['tanggal_keluar']?></td>
  							<td><?=$data['sku']?></td>
  							<td><?=$data['nama_barang']?></td>
  							<td><?=$data['barang_keluar']?></td>
  							<!--<td><?=$data['petugas']?></td>-->
  							
  							
  						</tr>
		
  						<?php endwhile; ?>
  							<?php endif; ?>
  							<h3 style="color:#fc5810;">Total Yang Keluar : 
							<?php
							$sql2= "select sum(barang_keluar) as totalkeluar from barang_keluar where sku='$_GET[sku]'";
							$result2 = $db->query($sql2);
							$datakeluar = $result2->fetch_assoc();
							echo $datakeluar['totalkeluar'];
										?></h3>
										<h3 style="color:#fc5810;">
							Terakhir Update:
							<?php 
							$sqlo="SELECT tanggal FROM barang_masuk ORDER BY tanggal DESC Limit 1";
							$result1= $db->query($sqlo);
							$updatetgl= $result1->fetch_array();
							echo $updatetgl['tanggal'];
							?>
							</h3>



					</table>
				<!--	<div class="text-center">
						<ul class="pagination">
							<?php 
								$sql = "SELECT t_produk.sku, barang_keluar.* from t_produk INNER JOIN barang_keluar on t_produk.sku=barang_keluar.sku WHERE barang_keluar.sku='$_GET[sku]' ";
								$result = $db->query($sql);
								$record = $result->num_rows;
								$total_page = ceil($record / $per_page);
							 ?>
							<?php if($total_page != 1 && $page != 1): ?>
						    <li>
						      <a href="barang_keluar.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<li><a href="barang_keluar.php?page=<?= $i; ?>"><?=$i?></a></li>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						    <li>
						      <a href="barang_keluar.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
-->

			</div>
		</div>

<?php require "footer.php"; ?>