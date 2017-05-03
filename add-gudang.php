<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Daftar Gudang</a></li>
		<li class="active">Tambah Gudang</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<form enctype ="multipart/form-data" action="proses-addgudang.php" method="POST">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Kode Gudang</label>
									<input type="text" name="kd_gudang" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Gudang</label>
									<input type="text" name="nama_gudang" class="form-control">
								</div>
								<!--<div class="form-group">
									<label>Total Item</label>
									<input type="text" name="total_item" class="form-control">
								</div>

								<div class="form-group">
									<label>Total Rak</label>
									<input type="text" name="total_rak" class="form-control">
								</div>-->
										<div class="form-group">
											<input type="submit" class="btn-primary btn btn-xs" value="Save">
										</div>
									</div>
								</div></div>
							</div>
						</form>
					</div>
				</div>


			</div>
		</div>

<?php
require "footer.php";
?>