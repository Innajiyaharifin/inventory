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
				<?php 
				$sqlz="SELECT t_produk.* , 
						(select sum(barang_masuk) from barang_masuk where sku=t_produk.sku) as stok_awal, 
						(select sum(barang_keluar) from barang_keluar where sku=t_produk.sku) as stok_akhir,
						(select (stok_awal-stok_akhir) ) as stok
						from t_produk
						having stok <= 6";
						$result2 = $db->query($sqlz);
						$data2 = $result2->num_rows;
					#	$low_stok = 0;
					#	while ( $data2 = $result2->fetch_assoc()) {
					#		$low_stok ++;
					#	}
									
				 ?>
				<a href="stok-rendah.php" class="btn btn-info btn-xs" style="width:220px; height:90px; font-size:18px;">Low<br>Stock <br>(<?=$data2;?>)</a>
<?php 

$sqlm="SELECT t_produk.* , 
(select count(sku) from barang_keluar where sku=t_produk.sku and left(tanggal_keluar,7)='2017-03') as total_keluar
from t_produk
having total_keluar >=15";
$result3 = $db->query($sqlm);
						$data3 = $result3->num_rows;
					 ?>  				
  				<a href="fast_moving.php" class="btn btn-warning btn-xs" style="width:220px; height:90px; font-size:18px;" >Fast<br>Moving<br>(<?=$data3;?>)</a>

<?php
$sqls="SELECT t_produk.* , 
(select count(sku) from barang_keluar where sku=t_produk.sku and left(tanggal_keluar,7)='2017-03') as total_keluar
from t_produk
having total_keluar >=15";
$result4 = $db->query($sqls);
						$data4 = $result4->num_rows;
					 ?>  				

  				<a href="slow_moving.php" class="btn btn-danger btn-xs" style="width:220px; height:90px;font-size:18px;">Slow<br>Moving<br>(<?=$data4;?>)</a> 
			</div>
		</div>
	</div>
</div>
<?php require "footer.php"; ?>