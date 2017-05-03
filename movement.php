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
									<a href="print.php?sku=<?=$_GET['sku'] ?>" class="btn btn-sm btn-success pull-right">Cetak Laporan</a>

 
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
						//	$sql="SELECT t_produk.*, barang_masuk.*, barang_keluar.* from barang_masuk INNER JOIN t_produk on t_produk.sku=barang_masuk.sku INNER JOIN barang_keluar ON t_produk.sku = barang_keluar.sku WHERE t_produk.sku='$_GET[sku]' LIMIT $start_from, $per_page";
						$sqlp="SELECT p.sku, p.nama_produk, b.barang_masuk, b.tanggal, 
								null as barang_keluar, 
								null as tanggal_keluar
								from t_produk p, barang_masuk b
								where p.sku =b.sku
								and p.sku = '$_GET[sku]'

								union

								SELECT 
								p.sku, p.nama_produk, 
								null as barang_masuk, 
								null as tanggal,
								k.barang_keluar, k.tanggal_keluar
								from t_produk p, barang_keluar k
								where p.sku =k.sku
								and p.sku = '$_GET[sku]'";
							$resultp = $db->query($sqlp);
							$directory = dirname(__FILE__).'/uploads/';
						?>
	        <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
  			<tr>
  							<th>SKU</th>
  							<th>Nama Barang</th>
  							<th>Barang Masuk</th>
  							<th>Barang Keluar</th>
  							<th>Tanggal Masuk</th>
  							<th>Tanggal Keluar</th>
  						</tr>
  			</thead>
  					 		<?php if($resultp->num_rows >0) : $i = 0; ?>
							<?php while($data =$resultp->fetch_assoc()):?>			
							<tr>
  							
  							<td><?=$data['sku']?></td>
  							<td><?=$data['nama_produk']?></td>
							<td><?=$data['barang_masuk']?></td>
							<td><?=$data['barang_keluar']?></td>
							<td><?=$data['tanggal']?></td>
							<td><?=$data['tanggal_keluar']?></td>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table>
<!--					<div class="text-center">
						<ul class="pagination">
							<?php 
					$sql="SELECT t_produk.*, t_kategori.nama_kategori from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id";
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
