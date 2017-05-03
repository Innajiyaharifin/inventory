y<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<?php 
	if(isset($_GET) && count($_GET) > 0)
		$id = $_GET['id'];

	$sql= "SELECT t_produk.*, t_kategori.nama_kategori, t_gudang.stok_gudang, t_vendor.alamat, t_vendor.id as vendor_id, t_vendor.telp, t_vendor.name as vendor_name, t_user.email from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_gudang ON t_gudang.produk_id = t_produk.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id INNER JOIN t_user ON t_user.id = t_vendor.user_id WHERE t_produk.id = $id";
	$result = $db->query($sql);
	$data = $result->fetch_assoc();
	$directory = dirname(__FILE__).'/uploads/';
?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
	<li><a href="vendor.php">Vendor</a></li>
	<li><a href="vendor-detail.php?id=<?= $data['vendor_id']?>"><?= $data['vendor_name'] ?></a></li>
		<li class="active"><?= $data['nama_produk'] ?></li>
	</ul>
</div>
	<div class="container">
		
			
		<div class="row">
			<div class="col-md-9">
			<?php 
				if(isset($_GET) && count($_GET) > 0)
					$id = $_GET['id'];
				else
					$id = $_SESSION['vendor_id'];

				$sql= "SELECT t_produk.*, t_kategori.nama_kategori, t_gudang.stok_gudang, t_vendor.alamat, t_vendor.id as vendor_id, t_vendor.telp, t_vendor.name as vendor_name, t_user.email from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_gudang ON t_gudang.produk_id = t_produk.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id INNER JOIN t_user ON t_user.id = t_vendor.user_id WHERE t_produk.id = $id";
				$result = $db->query($sql);
				$data = $result->fetch_assoc();
				$directory = dirname(__FILE__).'/uploads/';
			?>
<div class="product product-list">
				<div class="row">
					<div class="col-md-3">
						<a href="product-detail.php">
							<?php if($data['featured_image'] != "" && file_exists($directory.$data['featured_image'])): ?>
									<img src="uploads/thumb/<?= $data['featured_image']; ?>"  class="img-responsive">
								<?php else: ?>
									<img src="images/product.jpg" class="img-responsive" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
								<?php endif; ?>
						</a>
					</div>
					<div class="col-md-6">
						<h5 class="prod-title"><a href="product-detail.php?id=<?=$data['id']?>"><?=$data['nama_produk']?></a></h5>
						<div class="product-author">by <a href="#"><?= $data['vendor_name'] ?></a></div>
						<p><?= nl2br($data['desc'])?></p>
					</div>
					<div class="col-md-3">
						Rp. <?= number_format($data['harga'], 2,',','.') ?>
					</div>
				</div>
			</div>
				<h4 class="detail-header">Gallery</h4>
			  	<div class="container">
		<div class="row">
			
			<table class="table table-striped">
  						<tr>
  							<th>SKU</th>
  							<th>Nama Barang</th>
  							<th>Stok di Gudang 1</th>
  							<th>Stok di Gudang 2</th>
  							<th>No Rak</th>
  						</tr>			
							<tr>
  							<td><?=$data['sku']?></td>
  							<td><?=$data['nama_produk']?></td>
  							<td><?=$data['stok_gudang']?></td>
  							<td></td>
							<td></td>
							<td></td>
							<td></td>
  						</tr>
  					
					</table>
					<!--	<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>SKU</label>
									<input type="text" value="<?= $data['id']?>" name="nama" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Product</label>
									<input type="text" value="<?= $data['nama_produk']?>" name="nama" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="text" value="<?= $data['harga']?>" name="harga" class="form-control">
								</div>
								<div class="form-group">
									<label>Total Stok</label>
									<input type="text" value="<?= $data['harga']?>" name="harga" class="form-control">
								</div>

								<div class="form-group">
									<label>Stok di Gudang 1</label>
									<input type="text" value="<?= $data['harga']?>" name="harga" class="form-control">
								</div>

								<div class="form-group">
									<label>Stok di Gudang 2</label>
									<input type="text" value="<?= $data['harga']?>" name="harga" class="form-control">
								</div>

								<div class="form-group">
									<label>Berat</label>
									<input type="text" value="<?= $data['id']?>" name="harga" class="form-control">
								</div>
								<div class="form-group">
									<label>Minimum Kuantiti</label>
									<input type="text" value="<?= $data['id']?>" ame="harga" class="form-control">
								</div>

								<div class="form-group">
									<label>Content</label>
									<textarea name="content" value="<?= $data['desc']?>" id="content" cols="10" rows="5" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Transaksi</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Status</label>
											<select name="status" id="status" class="form-control">
												<option value="0">Published</option>
											</select>
										</div>
										<div class="form-group">
											<?php 
												$sql = "SELECT * FROM t_kategori";
												$result = $db->query($sql);
											 ?>
											<label>Kategori</label>
											<select name="kategori" id="kategori" class="form-control">
												<?php if($result->num_rows >0) :?>
												<?php while($row =$result->fetch_assoc()):?>
												<option value="<?=$row['id']?>"><?=$row['nama_kategori']?></option>
												<?php endwhile ;?>
											<?php endif ;?>
												</select> 
										</div>
										<div class="form-group">
											<input type="submit" class="btn-primary btn btn-xs" value="Save">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>-->
				</div>

			
			
		</div>
		</div>

	</div>
<?php require "footer.php"; ?>