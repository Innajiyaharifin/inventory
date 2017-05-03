<?php require "connection.php";?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Daftar Barang</li>
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
		<div class="col-md-4"></div>
		<div class="col-md-5">
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
				<a href="list-product.php" class="btn btn-info btn-xs" style="width:100px; height:90px; width: 200px; font-size:18px;">Consinasi</a>
  								<a href="produk-jual-putus.php" class="btn btn-warning btn-xs" style="width:100px; height:90px; width: 200px; font-size:18px;" >Jual Putus</a> 
			</div>
		</div>
	</div>
</div>
<?php require "footer.php"; ?>