<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="user-profile.php">Profile</a></li>
		<li class="active">Rencana Pernikahan</li>
	</ul>
</div>
	
	<div class="container">
		<div class="row">
			<?php require "sidebar-member.php" ?>
			<div class="col-md-9">
					<div class="content_dash">
						<h4 class="detail-header">
							Rencana Pernikahan
						</h4>
						<?php 
							  	$sql="SELECT t_plan.*, (SELECT SUM(harga) FROM t_detail_plan WHERE plan_id = t_plan.id) as biaya  FROM t_plan WHERE user_id =".$_SESSION['user_id'];
				     			$result = $db->query($sql);
					   	?>
					   	<?php if($result->num_rows > 1): ?>
						<table class="table table-bordered table-hover">
						  <tr>
						  	<th>#</th>
						  	<th>Tanggal Pernikahan</th>
						  	<th>Total Budget</th>
						  	<th>Jumlah Biaya</th>
						  	<th></th>
						  </tr>
						  <?php $i = 1; while($data = $result->fetch_object()): ?>
						  <tr>
						  	<td><?= $i++; ?></td>
						  	<td><?= date('d F Y', strtotime($data->wedding_date)) ?></td>
						  	<td>Rp. <?= number_format($data->budget, 2, ',','.'); ?></td>
						  	<td>Rp. <?= number_format($data->biaya, 2, ',','.'); ?></td>
						  	<td><a class="btn btn-sm btn-pink" href="user-plan-detail.php?id=<?= $data->id ?>">Lihat</a></td>
						  </tr>
							<?php endwhile; ?>
						</table>
						<?php else: ?>
							<p>Tidak ada</p>
						<?php endif; ?>

					</div>
			</div>
		</div>
	</div>
<?php require "footer.php"; ?>