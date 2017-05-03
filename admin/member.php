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
							$sql= "SELECT v.*, u.email FROM t_member v INNER JOIN t_user u ON u.id = v.user_id ORDER BY v.id desc LIMIT $start_from, $per_page";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
						?>
						<h3>Data Member</h3>
					<table class="table table-striped">
  						<tr>
  							<th>Nama</th>
  							<th>Email</th>
  							<th>Telp</th>
  						</tr>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							<td><?=$data['fullname']?></td>
  							<td><?=$data['email']?></td>
  							<td><?=$data['telp']?></td>
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
						      <a href="member.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<li><a href="member.php?page=<?= $i; ?>"><?=$i?></a></li>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						    <li>
						      <a href="member.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						</ul>
					</div>
</div>
<?php require "footer.php"; ?>
