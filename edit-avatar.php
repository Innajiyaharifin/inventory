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
				$id=$_SESSION['vendor_id'];
				$sql= "SELECT * FROM t_vendor WHERE id=$id";
				$result = $db->query($sql);
	     		$data = $result->fetch_assoc();
			?>

	<div class="container">
		<div class="row">
			<?php require "sidebar-vendor.php" ?>
				<div class="col-md-8">
							<?php if($data['logo'] != "" ): ?>
								<img src="uploads/thumb/<?= $data['logo'] ?>" alt="<?= $data['logo']  ?>" class="img-responsive img-thumbnail img-circle">
							<?php else: ?>
								<img src="images/default.png" alt="Post" class="img-thumbnail img-circle">
							<?php endif; ?>
							<div class="form-group">
								
							<form enctype ="multipart/form-data" action="proses-editavatar.php" method="POST" class="form-inline">	
								<input type="file" name="image" class="form-group">
								<input type="hidden" name="old_image" value="<?= $data['logo']?>">
								<input type="submit" class="btn-primary btn btn-sm" value="Upload">
							</div>
							<div class="form-group">
								
							</div>	
					</form>
						</div>

			</div>
		</div>

<?php
require "footer.php";
?>