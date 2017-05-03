<?php require "header.php"; ?>
<?php require "connection.php"; ?>

<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
	
	
		<li class="active">Profile</li>
	</ul>
</div>

	
	<div class="container">
		<div class="row">
			<?php require "sidebar-member.php"; ?>
			<div class="col-md-9">
				

					<div class="content_dash">
						<h4 class="detail-header">
							My Profile
						</h4>
						<div class="profile-detail">
						<?php
							if(isset($_GET) && count($_GET) > 0)
								$id = $_GET['id'];
							else
								$id = $_SESSION['user_id'];
							 $sql="SELECT t_member.*, t_user.email FROM t_user INNER JOIN t_member ON t_user.id = t_member.user_id WHERE t_member.user_id =".$id;
			     			$result = $db->query($sql);
			     			$data = $result->fetch_object();

						?>
							<p>
								<label>Nama Lengkap</label>
								<span><?= $data->fullname; ?></span>
							</p>
							<p>
								<label>Alamat</label>
								<span><?= $data->alamat; ?></span>
							</p>
							
							<p>
								<label>Email</label>
								<span><a href="<?= $data->email; ?>" class="mailto"><?= $data->email; ?></a></span>
							</p>
							<p>
								<label>Handphone</label>
								<span><?= $data->telp; ?></span>
							</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>