<?php require "../connection.php";?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Dashboard</li>
	</ul>
</div>
<div class="container">
	<div class="row">
		<?php 
			
			$sql= "SELECT v.*, u.email FROM t_vendor v INNER JOIN t_user u ON u.id = v.user_id ORDER BY v.id desc LIMIT 5 ";
			$result = $db->query($sql);
			
			
		?>
		<div class="col-md-4">
			<div class="content_dash">
				<h4 class="detail-header">
					5 Vendor Terbaru
				</h4>
					<ul>
						<?php if($result->num_rows): ?>
						<?php while($data = $result->fetch_assoc()): ?>
						
							<li><a href="../vendor-profile.php?id=<?= $data['id'] ?>"><?= $data['name'] ?></a> </li>
						
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				
			</div>
		</div>
		<?php 
			
			$sql= "SELECT v.*, u.email FROM t_member v INNER JOIN t_user u ON u.id = v.user_id ORDER BY v.id desc LIMIT 5 ";
			$result = $db->query($sql);
			
			
		?>
		<div class="col-md-4">
			<div class="content_dash">
				<h4 class="detail-header">
					5 Member Terbaru
				</h4>
					<ul>
						<?php if($result->num_rows): ?>
						<?php while($data = $result->fetch_assoc()): ?>
						
							<li><a href="../user-profile.php?id=<?= $data['user_id'] ?>"><?= $data['fullname'] ?></a> </li>
						
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				
			</div>
		</div>

		<?php 
			
			$sql= "SELECT r.*, m.fullname, v.name FROM t_report r INNER JOIN t_member m ON r.member_id = m.id INNER JOIN t_vendor v ON v.id = r.vendor_id ORDER BY report_date desc LIMIT 5 ";
			$result = $db->query($sql);
			
			
		?>
		<div class="col-md-4">
			<div class="content_dash">
				<h4 class="detail-header">
					5 Laporan Terbaru
				</h4>
					<ul>
						<?php if($result->num_rows): ?>
						<?php while($data = $result->fetch_assoc()): ?>
						
							<li><a href="report.php?id=<?= $data['id'] ?>"><?= $data['fullname'] ?> Melaporkan <?= $data['name'] ?></a> </li>
						
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				
			</div>
		</div>
	</div>
</div>
<?php require "footer.php"; ?>