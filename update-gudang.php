<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Profile</a></li>
		<li class="active">Edit</li>
	</ul>
</div>
			<?php
				$id=$_GET['id'];
				$sql= "SELECT * FROM t_daftar_gudang WHERE id=$id";
				$result = $db->query($sql);
	     		$data = $result->fetch_object();
			?>
	
	<div class="container">
		
			<form enctype ="multipart/form-data" action="proses-updategudang.php" method="POST">
				<input type="hidden" value="<?=$id?>" name="id" class="form-control">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Kode Gudang</label>
							<input type="text" value="<?=$data->kd_gudang;?>" name="kd_gudang" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama Gudang</label>
							<input type="text" value="<?=$data->nama_gudang;?>" name="nama_gudang" class="form-control">
						</div>
						<div class="form-group">
							<label>Total Item</label>
							<input type="text" value="<?= $data->total_item; ?>" name="total_item" class="form-control">
						</div>
								<div class="form-group">
									<input type="submit" class="btn-primary btn btn-xs" value="Save">
								</div>
							</div></div>
						</div>
					</div>
				</div>
			</form>
		
	</div>


		

<?php
require "footer.php";
?>