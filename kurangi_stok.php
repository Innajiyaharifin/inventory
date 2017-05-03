<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Profile</a></li>
		<li class="active">Kurangi Stok</li>
	</ul>
</div>
			<?php
				$sku=$_GET['sku'];
				$sql= "SELECT * FROM t_produk WHERE sku='$sku'";
				$result = $db->query($sql);
				$data = $result->fetch_object();
			?>
	
	<div class="container">
		
			<form enctype ="multipart/form-data" action="proses_kurangi.php" method="POST">
				<input type="hidden" value="<?=$id?>" name="id" class="form-control">
				<div class="row">

		<div class="form-group">
							<input type="hidden" name="sku" value="<?=$data->sku;?>" class="form-control" >
						</div>
						<div class="form-group">
							<input type="hidden" name="nama_barang" value="<?=$data->nama_produk;?>" class="form-control" >
						</div>
						<div class="form-group">
							<input type="hidden" value="<?php echo $_SESSION['vendor_name']; ?>" name="petugas" class="form-control" >
						</div>
										<div class="form-group">
							<label>Stok Keluar</label>
							<input type="text" name="barang_keluar" class="form-control" >
						</div>
								<div class="form-group">
									<input type="submit" class="btn-primary btn btn-xs" style="width:100px; height:50px;" value="Submit">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		
	</div>


		

<?php
require "footer.php";
?>