<?php require "connection.php";?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Dashboard</li>
	</ul>
</div>
<div class="container">
	<div class="row">
		<!--<?php //if(isset($_SESSION['member_id'])): ?>
			<?php //require("sidebar-unvendor.php"); ?>
		<?php //else: ?>
			<?php //require("sidebar-vendor.php"); ?>
		<?php //endif; ?>-->
		<?php 
			if(isset($_GET) && count($_GET) > 0)
				$id = $_GET['id'];
			else
				$id = $_SESSION['vendor_id'];

			$sql= "SELECT v.*, u.email FROM t_vendor v INNER JOIN t_user u ON u.id = v.user_id  WHERE v.id=$id";
			$result = $db->query($sql);
			$data = $result->fetch_assoc();
		?>
		<div class="col-md-2">	</div>
		<div class="col-md-8">
			<div class="content_dash">
				<!--<h4 class="detail-header">
					My Profile
				</h4>
				<div class="profile-detail">
					<p>
						<label>Penanggung Jawab</label>
						<span><?= $data['responsible_name'] ?></span>
					</p>
					<p>
						<label>Alamat</label>
						<span><?= $data['alamat'] ?></span>
					</p>
					<p>
						<label>Email</label>
						<span><a href="mailto:<?= $data['email'] ?>" class="mailto"><?= $data['email'] ?></a></span>
					</p>
					<p>
						<label>Handphone</label>
						<span><a href="tel:<?= $data['telp'] ?>"><?= $data['telp'] ?></a></span>
					</p>
				</div>
				-->
				<a href="page_barang.php" class="btn btn-info btn-xs" style="width:220px; height:90px; font-size:18px;">Low<br>Stock</a>
  								<a href="list-gudang.php" class="btn btn-warning btn-xs" style="width:220px; height:90px; font-size:18px;" >Fast<br>Moving</a>
  								<a href="register.php" class="btn btn-danger btn-xs" style="width:220px; height:90px;font-size:18px;">Slow<br>Moving</a> 
			</div>
		</div>
	</div>
</div>
<?php require "footer.php"; ?>