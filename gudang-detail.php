<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<!--<?php 
//	if(isset($_GET) && count($_GET) > 0)
//		$kd_gudang = $_GET['kd_gudang'];

//	$sql= "SELECT name,  WHERE t_gudang.kd_gudang = $kd_gudang";
//	var_dump($sql);
//	$result = $db->query($sql);
//	$data = $result->fetch_assoc();
?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
	<li><a href="vendor.php">Vendor</a></li>
	</ul>
</div>-->
	<div class="container">		
		<div class="row">
			<div class="col-md-9">
			<?php 
				if(isset($_GET) && count($_GET) > 0)
					$id = $_GET['id'];
				else
					$id = $_SESSION['vendor_id'];

				$sql= "SELECT kd_gudang, nama_gudang, vendor_id, total_item, total_rak FROM t_daftar_gudang WHERE id = $id";
		
				$result = $db->query($sql);
				$data = $result->fetch_assoc();
			
			?>
<div class="product product-list">
				<div class="row">
					<div class="col-md-3">
				
			
				<h4 class="detail-header">Detail Gudang</h4>
			  	<div class="container">
		<div class="row">
			
			<table class="table table-striped">
  						<tr>
  							<th>Kode Gudang</th>
  							<th>Nama Gudang</th>
  							<th>Jumlah Item</th>
  							<th>Jumlah Rak</th>
  						</tr>			
							<tr>
  							<td><?=$data['kd_gudang']?></td>
  							<td><?=$data['nama_gudang']?></td>
  							<td><?=$data['total_item']?></td>
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
<div class="col-sm-9">
							<h1 class="mb20">Produk
									<a href="lihatproduk.php?kd_gudang=<?= $data['kd_gudang'] ?>" class="btn btn-sm btn-success pull-right">Lihat Produk</a>
							</h1>
						
						
		</div>
		</div>
</div>
	</div>
<?php require "footer.php"; ?>