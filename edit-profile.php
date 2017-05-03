<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Profile</a></li>
		<li class="active">Edit</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<?php require "sidebar-member.php" ?>
			<div class="col-md-9">
				

					<div class="content_dash">
						<h4 class="detail-header">
							My Profile
						</h4>
						</h4>
							<?php
//							echo "<pre>";
//							print_r($_POST);
//							$sql=mysql_query("SELECT * from t_vendor where id=".$_SESSION['vendor_id']);
//							$result = $db->query($sql);
//			     			$data = $result->fetch_object();
							

							$sql="SELECT t_user.email, t_member.* FROM t_user INNER JOIN t_member ON t_user.id = t_member.user_id  WHERE t_user.id =".$_SESSION['user_id'];
			     			$result = $db->query($sql);
			     			$data = $result->fetch_object();
			     			

							/*
							ini yg ayang
								$id=$_GET['id'];
								$query=mysql_query("select * from t_vendor where id=$id");
								$row=mysql_fetch_assoc($query);
							*/
							
							?>

						<form class="form-horizontal" method="post" action="proses_editprofile.php">
						<input type="hidden" name="id" value="<?= $data->id ?>">

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" id="inputEmail3" name="name" value="<?= $data->fullname ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
						    <div class="col-sm-6">
						      <textarea class="form-control" rows="3" name="alamat"><?= $data->alamat ?></textarea>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						    <div class="col-sm-6">
						      <input type="email" class="form-control" id="inputEmail3" name="email" value="<?= $data->email ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Handphone</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" id="inputEmail3" name="hp" value="<?= $data->telp ?>">
						    </div>
						  </div>
						  </div>
						  <div class="form-group">
						    
						      <button type="submit" class="btn btn-pink">Save</button>
						    
						  </div>
						</form>

					</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>