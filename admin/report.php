<?php require "../connection.php"; ?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Member</li>
	</ul>
</div>
<div class="container">
<?php
			     			$per_page = 8;
			     			
							if (isset($_GET["page"]))
								$page  = $_GET["page"];
							else  
								$page=1;
							
							$start_from = ($page-1) * $per_page;
							$sql= "SELECT r.*, m.fullname, v.name, u.status FROM t_report r INNER JOIN t_member m ON r.member_id = m.id INNER JOIN t_vendor v  ON v.id = r.vendor_id INNER JOIN t_user u  ON u.id = v.user_id ORDER BY report_date LIMIT $start_from, $per_page";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
						<h3>Data Vendor</h3>
						<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
					<table class="table table-striped">
  						<tr>
  							<th>Pelapor</th>
  							<th>Tersangka</th>
  							<th>Pesan</th>
  							<th>Action</th>
  						</tr>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							<td><?=$data['fullname']?></td>
  							<td><?=$data['name']?></td>
  							<td><?=$data['message']?></td>
  							<?php if($data['status'] != 9): ?>
  								<td> <a class="btn btn-pink btn-xs" href="report-action.php?id=<?=$data['id']?>&amp;act=freeze">Bekukan</a></td>
  							<?php else: ?>
  								<td> <a class="btn btn-pink btn-xs" href="report-action.php?id=<?=$data['id']?>&amp;act=unfreeze">Pulihkan</a></td>
  							<?php endif; ?>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table>
					<div class="text-center">
						<ul class="pagination">
							<?php 
								$sql = "SELECT v.*, u.email FROM t_member v INNER JOIN t_user u ON u.id = v.user_id";
								$result = $db->query($sql);
								$record = $result->num_rows;
								$total_page = ceil($record / $per_page);
							 ?>
							<?php if($total_page != 1 && $page != 1): ?>
						    <li>
						      <a href="vendor.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<li><a href="vendor.php?page=<?= $i; ?>"><?=$i?></a></li>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						    <li>
						      <a href="vendor.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						</ul>
					</div>
</div>
<?php require "footer.php"; ?>
