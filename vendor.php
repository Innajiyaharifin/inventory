<?php require "header.php"; ?>
<?php require_once "connection.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Vendor</li>
	</ul>
</div>
	<div class="container">
		<div class="row">
			<?php
     			$per_page = 8;
     			
				if (isset($_GET["page"]))
					$page  = $_GET["page"];
				else  
					$page=1;

				$start_from = ($page-1) * $per_page;
				$sql="SELECT t_vendor.* FROM t_vendor INNER JOIN t_user ON t_user.id = t_vendor.user_id WHERE t_user.status = 1  LIMIT $start_from, $per_page";
				$result = $db->query($sql);
				$directory = dirname(__FILE__).'/uploads/avatar/';
			?>
		 	
				
					<?php if($result->num_rows >0) :
						$i = 1;?>
					<?php while($data =$result->fetch_assoc()):?>			
					<div class="col-md-3 col-sm-6 product">
						<div class="product-thumb">
							<a href="vemdor-detail.php" class="post-image text-center logo-vendor">
								<div class="text-center">
								<?php if($data['logo'] != "" && file_exists($directory.$data['logo'])): ?>
									<img src="uploads/avatar/thumb/<?= $data['logo']; ?>"  class="img-thumbnail img-responsive img-circle">
								<?php else: ?>
									<img src="images/default.png" class="img-responsive img-thumbnail img-circle">
								<?php endif; ?>
								</div>
							</a>
							<div class="product-detail">
								<h5><?=$data['name']?></a></h5>

								<a class="btn-pink btn btn-sm" href="vendor-detail.php?id=<?= $data['id'] ?>">Selengkapnya</a>
							</div>
						</div>
					</div>
					<?php if($i%4 == 0): ?> <!-- setiap 3 item yang ditampilkan, row nya akan ditutup -->
						</div><div class="row">
					<?php endif; $i++; ?>

					<?php endwhile ;?>
					<?php else: ?>
						<p class="text-center">Tidak Ada Vendor</p>
					<?php endif ;?>
							</div>
		<div class="text-center">
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM t_vendor";
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

</div>
<?php require "footer.php"; ?>