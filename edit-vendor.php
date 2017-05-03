<?php require "connection.php"; ?>
<?php require "header.php"; ?>

<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="vendor-profile.php">Profile</a></li>
		<li class="active">Edit</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<?php require "sidebar-vendor.php"; ?>
			<div class="col-md-9">
				

					<div class="content_dash">
						<h4 class="detail-header">
							My Profile
						</h4>
						<?php							
							$id = $_SESSION['vendor_id'];
							$sql= "SELECT v.*, u.email FROM t_vendor v INNER JOIN t_user u ON u.id = v.user_id  WHERE v.id=$id";
			     			$result = $db->query($sql);
			     			$data = $result->fetch_object();
						?>

						<form class="form-horizontal" method="post" action="proses_editsave.php">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Vendor Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  placeholder="Vendor Name" name="vname" value="<?= $data->name ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Penanggung Jawab</label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  placeholder="Penanggung Jawab" name="fullname" value="<?= $data->responsible_name ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-6">
									<input type="email" class="form-control"  placeholder="Email" name="email" value="<?= $data->email ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Address</label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="3" placeholder="Address" name="alamat"><?= $data->alamat ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Handphone</label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  placeholder="Handphone" name="telp" value="<?= $data->telp ?>">
								</div>
							</div>
							
							<div class="col-md-8 text-right">
								<button type="submit" class="btn btn-pink">Save</button>
							</div>
						</form>

					</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>